<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use App\Models\Certificate;
// use Illuminate\Support\Facades\Storage;
use Response;
use File;
use Auth;
use Session;

class HomeController extends Controller
{
    protected $user, $cert;

    public function __construct(UserRepositoryInterface $user, CertificateRepositoryInterface $cert)
    {
        $this->user = $user;
        $this->cert = $cert;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = $this->user->findById(Auth::id());

        return view('page.homepage', compact('user'));
    }

    public function download(Certificate $certificate)
    {
        $with = ['user'];
        $data = [
            'user_id' => Auth::id(),
            'deleted_at' => Null,
        ];
        $certificate = $this->cert->getData($with, $data)->first();
        // File::put(public_path('/p12/cert'.$certificate->id.'.pem'), $certificate->certificate);
        $file = public_path().'/p12/cert'.$certificate->id.'.p12';
        $headers = [
            'Content-Type : application/p12',
        ];

        return Response::download($file, 'cert.p12', $headers);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}
