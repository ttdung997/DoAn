@extends('master')

@section('title', 'Thông tin chứng thư')

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-9 mt-4">
                <div class="profile-img">
                    <h1 class="text-center">Thông tin chứng thư</h1>
                </div>
            </div>
            <div class="col-md-2 mt-4 pt-1">
                <a class="btn btn-info" href="{{ route('certificates.index') }}">Quay lại</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10">
            {{-- {!! Form::open(['method' => 'POST', 'route' => ['register-request.store']]) !!} --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {{-- {!! Form::hidden('message', 'Yêu cầu cấp chứng thư') !!} --}}
                {!! Form::hidden('user_id', Auth::id()) !!}
                <div class="row">
                    <h5 class="mt-5 ml-4 pl-2">Subject Name</h5>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>C (Country):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['C'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>ST (State):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['ST'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>L (Locality):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['L'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>O (Organization):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['O'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>CN (Common Name):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['CN'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>EMAIL (Email Address):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['emailAddress'] }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5 class="mt-3 ml-4 pl-2">Issued Certificate</h5>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Version:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['version'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Serial Number:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ serialNumberHex(openssl_x509_parse($certificate->certificate)['serialNumberHex']) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Not Valid Before:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ date('d-m-Y', openssl_x509_parse($certificate->certificate)['validFrom_time_t']) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Not Valid After:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ date('d-m-Y', openssl_x509_parse($certificate->certificate)['validTo_time_t']) }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5 class="mt-3 ml-4 pl-2">Status</h5>
                </div>
                <div class="custom-control custom-radio mb-3">
                    @if ($certificate->status == 0)
                        <span class='badge badge-pill badge-success ml-4'>Active</span>
                    @elseif ($certificate->status == 1)
                        <span class='badge badge-pill badge-danger ml-4'>Thu hồi</span>
                    @else
                        <span class='badge badge-pill badge-warning ml-4'>Pending</span>
                    @endif
                </div>
            {{-- {!! Form::close() !!} --}}
            </div>
        </div>
    </div>
@endsection
