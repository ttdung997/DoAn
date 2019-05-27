@extends('master')

@section('title', 'Yêu cầu')

@section('content')
    @include('layouts.notify')

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-9 mt-4">
                <div class="profile-img">
                    <h1 class="text-center">Thông tin yêu cầu</h1>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <a class="btn btn-info" href="{{ route('number-requests.index') }}">Trang chủ</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10">
            {!! Form::model($introRequest, ['method' => 'PUT', 'route' => ['intro-requests.update', $introRequest->id]]) !!}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {!! Form::hidden('user_id', $introRequest->user_id) !!}
                {!! Form::hidden('message', $introRequest->request_of_user['message']) !!}
                {!! Form::hidden('type', $introRequest->request_of_user['type']) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên người dùng</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="username" value="{{ $introRequest->request_of_user['username'] }}" disabled>
                    </div>
                    {!! Form::hidden('username', $introRequest->request_of_user['username']) !!}
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Email</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="email" class="form-control" name="email" value="{{ $introRequest->request_of_user['email'] }}" disabled>
                        {!! Form::hidden('email', $introRequest->request_of_user['email']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên gọi chung</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($introRequest->status == 0)
                            @if (empty($certificate))
                                <input type="text" class="form-control" name="common_name" value="{{ $introRequest->request_of_user['common_name'] }}" required>
                            @else
                                <input type="text" class="form-control" name="common_name" value="{{ $introRequest->request_of_user['common_name'] }}">
                            @endif
                        @else
                            <input type="text" class="form-control" name="common_name" value="{{ $introRequest->request_of_user['common_name'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Cơ quan</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($introRequest->status == 0)
                            <input type="text" class="form-control" name="organization" value="{{ $introRequest->request_of_user['organization'] }}" required>
                        @else
                            <input type="text" class="form-control" name="organization" value="{{ $introRequest->request_of_user['organization'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quốc gia</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($introRequest->status == 0)
                            <input type="text" class="form-control" name="country" value="{{ $introRequest->request_of_user['country'] }}" required>
                        @else
                            <input type="text" class="form-control" name="country" value="{{ $introRequest->request_of_user['country'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quận/Huyện</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($introRequest->status == 0)
                            <input type="text" class="form-control" name="locality" value="{{ $introRequest->request_of_user['locality'] }}" required>
                        @else
                            <input type="text" class="form-control" name="locality" value="{{ $introRequest->request_of_user['locality'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tỉnh/TP</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($introRequest->status == 0)
                            <input type="text" class="form-control" name="province" value="{{ !empty($introRequest->request_of_user['province']) ? $introRequest->request_of_user['province'] : '' }}" required>
                        @else
                            <input type="text" class="form-control" name="province" value="{{ !empty($introRequest->request_of_user['province']) ? $introRequest->request_of_user['province'] : '' }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Vai trò</strong></span>
                    </div>
                    <div class="col-md-6 mt-5 pt-1">
                        <strong><i>Bác sỹ</i></strong>
                    </div>
                </div>
                @if ($introRequest->status == 0)
                    <div class="row">
                        <div class="col-md-2 mt-5 pt-1 ml-5">
                            <span><strong>Trạng thái</strong></span>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="custom-control custom-radio custom-control-inline">
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" {{ $introRequest->status == 0 ? 'checked' : '' }} value="0">
                                    <label class="custom-control-label" for="customRadioInline1">Đang chờ</label>

                                </span>
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" {{ $introRequest->status == 1 ? 'checked' : '' }} value="1">
                                    <label class="custom-control-label" for="customRadioInline2">Đã xử lý</label>
                                </span>
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline3" name="status" class="custom-control-input" {{ $introRequest->status == 2 ? 'checked' : '' }} value="2">
                                    <label class="custom-control-label" for="customRadioInline3">Hủy yêu cầu</label>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                        @if ($introRequest->status == 0)
                            <input type="submit" value="Chấp nhận" class="btn btn-success mr-5">
                        @endif
                        <a href="{{ route('number-requests.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
