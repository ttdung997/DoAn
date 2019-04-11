<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Notifications\SendRegisterCert;
use Auth;

class RegisterRequestController extends Controller
{
    protected $requestCert;

    public function __construct(NumberRequestRepositoryInterface $requestCert, UserRepositoryInterface $user)
    {
        $this->requestCert = $requestCert;
        $this->user = $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.homepage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->except(['message']);
        $data['password'] = bcrypt($request->password);
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
