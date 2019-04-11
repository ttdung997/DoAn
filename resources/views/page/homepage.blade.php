@extends('main')

@section('title', 'Trang chủ')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-9 mt-4">
                <div class="profile-img">
                    <h1 class="text-center">Tạo yêu cầu</h1>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10">
            {!! Form::open(['method' => 'POST', 'route' => 'register-request.store']) !!}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {!! Form::hidden('message', 'yêu cầu cấp chứng thư') !!}
                {!! Form::hidden('user_id', Auth::id()) !!}
                {!! Form::hidden('end_entity_profile', 'EntityProfilesEndUser') !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên người dùng</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="username" placeholder="Nhập tên bạn" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Mật khẩu</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu cho yêu cầu này" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Email</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên gọi chung</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="common_name" placeholder="Nhập tên">
                    </div>
                    <div class="col-md-3 mt-5 pt-2">
                        <i>(Không bắt buộc)</i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Cơ quan</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="organization" placeholder="Nhập tên cơ quan" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quốc gia</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="country" placeholder="Nhập tên quốc gia" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quận/Huyện</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="locality" placeholder="Nhập tên quân/huyện" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tỉnh/TP</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="province" placeholder="Nhập tên tỉnh/tp" required>
                    </div>
                </div>
                {!! Form::hidden('certificate_profile', 'CertificateProfileEndUser') !!}
                {!! Form::hidden('CA', 'CAHust') !!}
                {!! Form::hidden('token_id', '2') !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Ngày hẹn trả</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="date" class="form-control" name="days_to_return" required>
                    </div>
                </div>
                {!! Form::hidden('status', '0') !!}
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                            <input type="submit" value="Gửi yêu cầu" class="btn btn-success mr-5">
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            Hủy
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
