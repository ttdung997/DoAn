@extends('master')

@section('title', 'Yêu cầu')

@section('stylesheets')
    {!! Html::style('assets/css/select2.min.css') !!}
@endsection

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
            {!! Form::model($numberRequest, ['method' => 'PUT', 'route' => ['number-requests.update', $numberRequest->id]]) !!}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {!! Form::hidden('user_id', $numberRequest->user_id) !!}
                {!! Form::hidden('message', $numberRequest->request_of_user['message']) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên người dùng</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" class="form-control" name="username" value="{{ $numberRequest->request_of_user['username'] }}" disabled>
                    </div>
                    {!! Form::hidden('username', $numberRequest->request_of_user['username']) !!}
                </div>
                {!! Form::hidden('password', $numberRequest->request_of_user['password']) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Email</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="email" class="form-control" name="email" value="{{ $numberRequest->request_of_user['email'] }}" disabled>
                        {!! Form::hidden('email', $numberRequest->request_of_user['email']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên gọi chung</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($numberRequest->status == 0)
                            @if (empty($certificate))
                                <input type="text" class="form-control" name="common_name" value="{{ $numberRequest->request_of_user['common_name'] }}" required>
                            @else
                                <input type="text" class="form-control" name="common_name" value="{{ $numberRequest->request_of_user['common_name'] }}">
                            @endif
                        @else
                            <input type="text" class="form-control" name="common_name" value="{{ $numberRequest->request_of_user['common_name'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Cơ quan</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($numberRequest->status == 0)
                            <input type="text" class="form-control" name="organization" value="{{ $numberRequest->request_of_user['organization'] }}" required>
                        @else
                            <input type="text" class="form-control" name="organization" value="{{ $numberRequest->request_of_user['organization'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quốc gia</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($numberRequest->status == 0)
                            <input type="text" class="form-control" name="country" value="{{ $numberRequest->request_of_user['country'] }}" required>
                        @else
                            <input type="text" class="form-control" name="country" value="{{ $numberRequest->request_of_user['country'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quận/Huyện</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($numberRequest->status == 0)
                            <input type="text" class="form-control" name="locality" value="{{ $numberRequest->request_of_user['locality'] }}" required>
                        @else
                            <input type="text" class="form-control" name="locality" value="{{ $numberRequest->request_of_user['locality'] }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tỉnh/TP</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        @if ($numberRequest->status == 0)
                            <input type="text" class="form-control" name="province" value="{{ !empty($numberRequest->request_of_user['province']) ? $numberRequest->request_of_user['province'] : '' }}" required>
                        @else
                            <input type="text" class="form-control" name="province" value="{{ !empty($numberRequest->request_of_user['province']) ? $numberRequest->request_of_user['province'] : '' }}" disabled>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Vai trò</strong></span>
                    </div>
                    <div class="col-md-6 mt-5 pt-1">
                        @if ($numberRequest->status == 0)
                            <select name="roles[]" class="browser-default custom-select select2-multi" multiple="multiple">
                                @foreach ($roles->role as $role)
                                    @if (in_array($role->oid, $numberRequest->request_of_user['roles']))
                                        <option value="{{ $role->oid }}" selected>{{ $role->name }}</option>
                                    @else
                                    <option value="{{ $role->oid }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            @foreach ($roles->role as $role)
                                @if (in_array($role->oid, $numberRequest->request_of_user['roles']))
                                    <span class="badge badge-primary">{{ $role->name }}</span>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @if ($numberRequest->status == 0)
                    <div class="row">
                        <div class="col-md-2 mt-5 pt-1 ml-5">
                            <span><strong>Trạng thái</strong></span>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="custom-control custom-radio custom-control-inline">
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" {{ $numberRequest->status == 0 ? 'checked' : '' }} value="0">
                                    <label class="custom-control-label" for="customRadioInline1">Đang chờ</label>

                                </span>
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" {{ $numberRequest->status == 1 ? 'checked' : '' }} value="1">
                                    <label class="custom-control-label" for="customRadioInline2">Đã xử lý</label>
                                </span>
                                <span class="mr-5">
                                    <input type="radio" id="customRadioInline3" name="status" class="custom-control-input" {{ $numberRequest->status == 2 ? 'checked' : '' }} value="2">
                                    <label class="custom-control-label" for="customRadioInline3">Hủy yêu cầu</label>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                        @if ($numberRequest->status == 0)
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
@section('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
