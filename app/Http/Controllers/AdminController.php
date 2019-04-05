<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('users.index');
            \Session::flush();
        }
        return view('admin.login');
    }

    public function postlogin(AdminRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', '=', $request->email)->firstOrFail();
            if ($user->role_id == 1) {
                return redirect()->route('users.index');
                \Session::flush();
            }
            else {
                \Session::flush();
                return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không dúng');
            }
        } else {
            \Session::flush();
            return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không dúng');
        }
    }

    public function logout()
    {
        \Session::flush();

        return redirect()->route('admin.login');
    }
}
