<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts._head')
    <link rel="stylesheet" href="{{ asset('assets/css/user-login.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Đăng nhập</h5>
                {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-signin']) !!}
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                        <label for="inputEmail">Email</label>
                    </div>
                    @if ($errors->has('email'))
                        <p class="help-block validated" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                    @endif

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                        <label for="inputPassword">Mật khẩu</label>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help-block validated" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </p>
                    @endif

                    <div class="custom-control custom-checkbox mb-3">
                        <small><a href="{{ route('password.request') }}">Quên mật khẩu?</a></small>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng nhập</button>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
        </div>
    </div>
    @include('layouts._script')
</body>
