<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts._head')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <div class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Đăng nhập</h2>
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => 'admin/login', 'method' => 'POST', 'class' => 'login-form']) !!}
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                            <input type="email" class="form-control" placeholder="email" name="email">
                            @if ($errors->has('email'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="password" name="password">
                            @if ($errors->has('password'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-check-label pt-2">
                                <small><a href="{{ route('password.request') }}">Quên mật khẩu?</a></small>
                            </label>
                            <button type="submit" class="btn btn-login float-right">Đăng nhập</button>
                        </div>
                    {!! Form::close() !!}
                    <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts._script')
</body>
