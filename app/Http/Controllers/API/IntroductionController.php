<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Notifications\SendRegisterCert;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use App\User;

class IntroductionController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $certificate = $this->cert->getCert($request->user_id);

        if ($certificate) {
            $request_of_user = $request->except('user_id');
            $request_of_user['message'] = 'Yêu cầu cấp chứng thư tạm thời';
            $request_of_user['type'] = 1;
            $request_of_user['role'] = ["1.2.3.4.5.6.2"];
            $data = [
                'user_id' => $request->user_id,
                'request_of_user' => $request_of_user,
                'status' => 0,
            ];
            $request_cert = $this->requestCert->create($data);

            $receivers = $this->user->getAllAdmin();
            $user = User::where('id', $request->user_id)->first();
            if (isset($receivers)) {
                foreach ($receivers as $receiver) {
                    $receiver->notify(new SendRegisterCert($user, $request_of_user['message'], $request_cert->id));
                }
                return response()->json('success', 200);
            } else {
                return response()->json('fail', 400);
            }
        } else {
            return response()->json('Bạn chưa có chứng thư hoặc đã bị thu hồi', 400);
        }
    }
}
