<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Notifications\SendRegisterCert;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use Auth;

use App\User;
class IntroductionController extends Controller
{
    protected $introRequest, $user, $cert;

    public function __construct(NumberRequestRepositoryInterface $introRequest, UserRepositoryInterface $user, CertificateRepositoryInterface $cert)
    {
        $this->introRequest = $introRequest;
        $this->user = $user;
        $this->cert = $cert;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $with = ['user'];
        $data = [
            'user_id' => Auth::id(),
            'type' => 1,
        ];
        $attribute = ['status', 'asc'];
        $certificates = $this->cert->getData($with, $data, ['*'], $attribute);

        return view('page.list-certTemps', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.introduction-cert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'request_of_user' => $request->all(),
            'status' => 0,
        ];
        $intro_request = $this->introRequest->create($data);
        $receivers = $this->user->getAllAdmin();

        if (isset($receivers)) {
            foreach ($receivers as $receiver) {
                $receiver->notify(new SendRegisterCert(Auth::user(), $request->message, $intro_request->id));
            }
            return back()->withSuccess('Gửi yêu cầu thành công!');
        } else {
            return back()->withError('Gửi yêu cầu thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->introRequest->markNotify($id);
        $introRequest = $this->introRequest->findById($id);

        return view('admin.requests.intro-edit', compact('introRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $receiver = User::where('id', $request->user_id)->first();
        try {
            if ($request->status == 1) {
                // gọi cert của bệnh viện
                $cert_bv = $this->cert->getCertAdmin(Auth::id());
                // lấy public key của bác sỹ đó
                $pub_key_sender = $this->cert->getPubKey($request->user_id);

                $request_of_user = $request->except(['user_id', 'status', '_method']);
                $data = [
                    'user_id' => $request->user_id,
                    'request_of_user' => $request_of_user,
                    'status' => $request->status,
                ];
                $this->introRequest->update($id, $data);

                $dn = [
                    'countryName' => splitCountry($request->country),
                    'stateOrProvinceName' => $request->province,
                    'localityName' => $request->locality,
                    'organizationName' => $request->organization,
                    'commonName' => $request->common_name,
                    'emailAddress' => $request->email,
                ];
                $configArgs = [
                    'digest_alg' => 'sha256',
                ];
                // Generate a certificate signing request use pubkey of doctor
                $csr = openssl_csr_new($dn, $pub_key_sender['key']);

                // Generate a self-signed cert, valid for 365 days
                $x509 = openssl_csr_sign($csr, $cert_bv['certificate'], $cert_bv['pkcs12']['pkey'], $days = 7, $configArgs, serialNumber());
                // save self-signed cert
                openssl_x509_export($x509, $certout);

                $data = [
                    'pkcs12' => null,
                    'user_id' => $request->user_id,
                    'certificate' => $certout,
                    'serial_number' => openssl_x509_parse($certout)['serialNumberHex'],
                    'type' => 1,
                    'valid_from_time' => date('Y-m-d H:m:s', openssl_x509_parse($certout)['validFrom_time_t']),
                    'valid_to_time' => date('Y-m-d H:m:s', openssl_x509_parse($certout)['validTo_time_t']),
                    'status' => 0
                ];
                $certificate = $this->cert->create($data);
                $message = 'Yêu cầu đã được xử lý';
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
