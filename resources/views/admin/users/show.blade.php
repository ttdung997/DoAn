@extends('master')

@section('title', 'Tài khoản')

@section('content')
    @include('layouts.notify')

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif
	<div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img class="avatar" src="{{ asset('assets/images/' . $user->avatar) }}">
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="profile-head">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <h6>
                            {{ $user->job }}
                        </h6>
                        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-info" href="{{ route('users.index') }}">Trang chủ</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work mt-4 mb-5">
                        <span class="email"><strong>Email</strong></span><br>
                        <p>{{ $user->email }}</p>
                        <span class="role"><strong>Vai trò</strong></span><br>
                        <p>{{ $user->role->name }}</p>
                        <span class="role"><strong>Nơi công tác</strong></span><br>
                        <p>{{ 'Bv. ' . $user->company }}</p>
                    </div>
                </div>
                <div class="col-md-8 mt-4">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Mã nhân viên</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>MSBS00{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Họ tên</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Giới tính</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->gender == 'male' ? 'Nam' : 'Nữ' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Ngày sinh</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ date('d-m-Y', strtotime($user->birthday)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Địa chỉ thường trú</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->permanent_residence }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Địa chỉ tạm trú</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->staying_address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Số CMND</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id_number }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Ngày cấp</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ date('d-m-Y', strtotime($user->id_date)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Nơi cấp</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id_address }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Sửa thông tin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 3000);
        });
    </script>
@endsection
