@extends('main')

@section('title', 'Yêu cầu')

@section('content')
    @include('layouts.notify')
    @if (\Session::has('warning'))
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> {!! Session::get('warning') !!}
        </div>
    @endif
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-9 mt-4">
                <div class="profile-img">
                    <h1 class="text-center">Thông tin yêu cầu</h1>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10">
            {!! Form::open(['method' => 'POST', 'route' => ['register-request.store']]) !!}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {!! Form::hidden('message', 'Yêu cầu cấp chứng thư') !!}
                {!! Form::hidden('user_id', Auth::id()) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên người dùng</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nhập tên" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Mật khẩu</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu cho chứng thư" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Email</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên gọi chung</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="common_name" value="{{ old('common_name') }}">
                    </div>
                    <div class="col-md-3 mt-5 pt-2">
                        <i>(không bắt buộc)</i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Cơ quan</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Nhập cơ quan" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quốc gia</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="Nhập quốc gia" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quận/Huyện</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="locality" value="{{ old('locality') }}" placeholder="Nhập quận/huyện" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tỉnh/TP</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="province" value="{{ old('province') }}" placeholder="Nhập Tỉnh/TP" required>
                    </div>
                </div>
                {!! Form::hidden('status', 0) !!}
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                        <input type="submit" value="Gửi yêu cầu" class="btn btn-success mr-5">
                        <input type="reset" value="Reset" class="btn btn-secondary mr-5">
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
