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
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['C'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>ST (State):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['ST'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>L (Locality):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['L'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>O (Organization):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['O'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>CN (Common Name):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['CN'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>EMAIL (Email Address):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['subject']['emailAddress'] }}</p>
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
                        <p>{{ openssl_x509_parse($certificate->certificate['cert'])['version'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Serial Number:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ serialNumberHex(openssl_x509_parse($certificate->certificate['cert'])['serialNumberHex']) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Not Valid Before:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ date('d-m-Y', openssl_x509_parse($certificate->certificate['cert'])['validFrom_time_t']) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 ml-5">
                        <span><strong>Not Valid After:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ date('d-m-Y', openssl_x509_parse($certificate->certificate['cert'])['validTo_time_t']) }}</p>
                    </div>
                </div>
                {!! Form::hidden('status', 0) !!}
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                        <input type="submit" value="Gửi yêu cầu" class="btn btn-success mr-5">
                        <input type="reset" value="Reset" class="btn btn-secondary mr-5">
                    </div>
                </div>
            {{-- {!! Form::close() !!} --}}
            </div>
        </div>
    </div>
@endsection
