<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Notifications\SendRegisterCert;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use App\Models\Certificate;
use Auth;

class RegisterRequestController extends Controller
{
    protected $requestCert, $user, $cert;

    public function __construct(NumberRequestRepositoryInterface $requestCert, UserRepositoryInterface $user, CertificateRepositoryInterface $cert)
    {
        $this->requestCert = $requestCert;
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
        $with = ['user'];
        $data = [
            'user_id' => Auth::id(),
        ];
        $certificates = $this->cert->getData($with, $data);

        return view('page.list-certs', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.register-cert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'status' => 0,
        ];
        $certificate = $this->cert->getData(['user'], $data)->first();

        if (!isset($certificate)) {
            $request_of_user = $request->except(['user_id', 'status', 'message']);

            $request_of_user['password'] = encrypt($request->password);
            $data = [
                'user_id' => $request->user_id,
                'request_of_user' => $request_of_user,
                'status' => 0,
            ];
            $request_cert = $this->requestCert->create($data);
            $receivers = $this->user->getAllAdmin();

            if (isset($receivers)) {
                foreach ($receivers as $receiver) {
                    $receiver->notify(new SendRegisterCert(Auth::user(), $request->message, $request_cert->id));
                }

                return back()->withSuccess('Gửi yêu cầu thành công!');
            } else {
                return back()->withError('Gửi yêu cầu thất bại!');
            }
        } else {
            return back()->withWarning('Bạn đã được cấp chứng thư');
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
        $certificate = $this->cert->findById($id);

        return view('page.show-cert', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
