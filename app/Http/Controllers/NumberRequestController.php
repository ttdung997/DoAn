<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use App\User;
use App\Models\Role;
use Auth;
use App\Notifications\SendRegisterCert;

class NumberRequestController extends Controller
{
    protected $numberRequest, $cert;

    public function __construct(NumberRequestRepositoryInterface $numberRequest, CertificateRepositoryInterface $cert)
    {
        $this->numberRequest = $numberRequest;
        $this->cert = $cert;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $with = ['user'];
        $numberRequests = $this->numberRequest->getData($with, []);

        return view('admin.requests.index', compact('numberRequests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $numberRequest = $this->numberRequest->findById($id);
        if ($numberRequest->status != 3) {
            if (isset($numberRequest->request_of_user['status'])) {
                $data = [
                    'user_id' => $numberRequest->user_id,
                    'status' => 1,
                ];
                $certificate = $this->cert->getDataOnlyTrashed(['user'], $data)->first();

                return view('admin.requests.revoke', compact('numberRequest', 'certificate'));
            } else {
                $roles = readXml();

                return view('admin.requests.edit', compact('numberRequest',  'roles'));
            }
        } else {
            $data = [
                'user_id' => $numberRequest->user_id,
                'status' => 0,
            ];
            $certificate = $this->cert->getData(['user'], $data)->first();

            return view('admin.requests.revoke', compact('numberRequest', 'certificate'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        $receiver = User::where('id', $request->user_id)->first();
        try {
            if ($request->status == 1) {
                $request_of_user = $request->except(['user_id', 'status', '_method']);
                $data = [
                    'user_id' => $request->user_id,
                    'request_of_user' => $request_of_user,
                    'status' => $request->status,
                ];
                $this->numberRequest->update($id, $data);

                // rename config file
                rename('/etc/ssl/openssl.cnf', '/etc/ssl/openssl_origin.cnf');
                rename("/etc/ssl/openssl-$request->role.cnf", '/etc/ssl/openssl.cnf');

                $dn = [
                    'countryName' => splitCountry($request->country),
                    'stateOrProvinceName' => $request->province,
                    'localityName' => $request->locality,
                    'organizationName' => $request->organization,
                    'commonName' => $request->common_name,
                    'emailAddress' => $request->email,
                ];
                // Generate a new private (and public) key pair
                $privkey = openssl_pkey_new([
                    'private_key_bits' => 4096,
                    'private_key_type' => OPENSSL_KEYTYPE_RSA,
                    'encrypt_key'      => true,
                ]);
                $configArgs = [
                    'digest_alg' => 'sha256',
                    // 'req_extensions' => 'v3_req',
                    'x509_extensions' => 'usr_cert',
                ];
                // Generate a certificate signing request
                $csr = openssl_csr_new($dn, $privkey);

                // Generate a self-signed cert, valid for 365 days
                $x509 = openssl_csr_sign($csr, null, $privkey, $days = 730, $configArgs, serialNumber());

                // save both private key and cert in a file
                $args = array(
                    'friendly_name' => 'Certificate'
                );
                openssl_pkcs12_export($x509, $certout, $privkey, decrypt($request->password), $args);
                openssl_pkcs12_read($certout, $pkcs12, decrypt($request->password));
                $data = [
                    'pkcs12' => $pkcs12,
                    'user_id' => $request->user_id,
                    'certificate' => $pkcs12['cert'],
                    'serial_number' => openssl_x509_parse($pkcs12['cert'])['serialNumberHex'],
                    'valid_from_time' => date('Y-m-d H:m:s', openssl_x509_parse($pkcs12['cert'])['validFrom_time_t']),
                    'valid_to_time' => date('Y-m-d H:m:s', openssl_x509_parse($pkcs12['cert'])['validTo_time_t']),
                    'status' => 0
                ];
                $certificate = $this->cert->create($data);
                openssl_pkcs12_export_to_file($x509, public_path('/p12/pkcs12_'.$certificate->id.'.p12'), $privkey, decrypt($request->password), $args);
                $message = 'Yêu cầu đã được xử lý';

                rename('/etc/ssl/openssl.cnf', "/etc/ssl/openssl-$request->role.cnf");
                rename('/etc/ssl/openssl_origin.cnf', '/etc/ssl/openssl.cnf');

            } elseif ($request->status == 2) {
                $data = [
                    'status' => $request->status,
                ];
                $this->numberRequest->update($id, $data);
                $message = 'Yêu cầu không được chấp nhận';
            } else {
                return redirect()->back()->withError('Trạng thái chưa thay đổi');
            }
            $receiver->notify(new SendRegisterCert(Auth::user(), $message, $id));

            return redirect()->route('number-requests.index')->withSuccess('Đã xử lý thành công');
        } catch (Exception $e) {
            return redirect()->route('number-requests.index')->withError('Xử lý thất bại');
        }
    }
}
