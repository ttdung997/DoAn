@extends('master')

@section('title', 'Yêu cầu')

@section('content')
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
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-10">
            {!! Form::model($numberRequest, ['method' => 'PUT', 'route' => ['number-requests.update', $numberRequest->id]]) !!}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mt-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                    </li>
                </ul>
                {!! Form::hidden('end_entity_profile', $numberRequest->end_entity_profile) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên người dùng</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="username" value="{{ $numberRequest->username }}" disabled>
                    </div>
                    {!! Form::hidden('username', $numberRequest->username) !!}
                </div>
                {!! Form::hidden('password', $numberRequest->password) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Email</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="email" class="form-control" name="email" value="{{ $numberRequest->email }}" disabled>
                        {!! Form::hidden('email', $numberRequest->email) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tên gọi chung</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="common_name" value="{{ $numberRequest->common_name }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Cơ quan</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="organization" value="{{ $numberRequest->organization }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Quốc gia</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="country" value="{{ $numberRequest->country }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Địa phương</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="locality" value="{{ $numberRequest->locality }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Tỉnh thành</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="province" value="{{ !empty($numberRequest->province) ? $numberRequest->province : 'NULL' }}" >
                    </div>
                </div>
                {!! Form::hidden('password', $numberRequest->certificate_profile) !!}
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>CA</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="CA" value="{{ $numberRequest->CA }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Token</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">
                        {!! Form::select('token_id', $tokens->pluck('name', 'id'), $numberRequest->token_id, ['class' => 'custom-select']) !!}
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mt-5 pt-1 ml-5">
                        <span><strong>Ngày hẹn trả</strong></span>
                    </div>
                    <div class="col-md-6 mt-5">    
                        <input type="text" class="form-control" name="days_to_return" value="{{ date('d-m-Y', strtotime($numberRequest->days_to_return)) }}" disabled>
                        {!! Form::hidden('days_to_return', $numberRequest->days_to_return) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-5 pt-1 ml-5">
                        <input type="submit" value="Chấp nhận" class="btn btn-success mr-5">
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
