<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use App\Models\Certificate;
use Response;
use File;
use Auth;
use Session;
use App\User;

class HomeController extends Controller
{
    protected $user, $cert;

    public function __construct(UserRepositoryInterface $user, CertificateRepositoryInterface $cert)
    {
        $this->user = $user;
        $this->cert = $cert;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = $this->user->findById($id);

        return $user;
    }

    public function download(Certificate $certificate)
    {
        if (isset($certificate)) {
            if (\Route::current()->getName() == 'download-cert') {
                openssl_x509_export_to_file($certificate->pkcs12['cert'], public_path('/p12/cert'.$certificate->id.'.pem'));
                $file = public_path().'/p12/cert'.$certificate->id.'.pem';
                $headers = [
                    'Content-Type : application/pem',
                ];

                return Response::download($file, 'cert.pem', $headers);
            } else {
                $file = public_path().'/p12/pkcs12_'.$certificate->id.'.p12';
                $headers = [
                    'Content-Type : application/p12',
                ];

                return Response::download($file, 'pkcs12.p12', $headers);
            }
        } else {
            return response()->json(['error' => 'Chứng thư không tồn tại'], 403);
        }
    }
}
