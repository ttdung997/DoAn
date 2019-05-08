<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; application/json"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Project - @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="This is an example dashboard created using build-in elements and components.">
<meta name="msapplication-tap-highlight" content="no">
<base href="{!! asset('') !!}">
<link rel="icon" href="{{ asset('assets/images/Certificate.png') }}" type="Healthy-medical">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/bootstrap4/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/Font-Awesome/css/solid.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/Font-Awesome/css/regular.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/toastr/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
@yield('stylesheets')
