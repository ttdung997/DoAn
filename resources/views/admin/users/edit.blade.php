@extends('master')
@section('title', 'Sửa tài khoản')
@section('content')
    @if (Session::has('error'))
        <div class="alert alert-warning" role="alert">
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    <div class="container">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img class="avatar mb-1" src="{{ asset('assets/images/' . $user->avatar) }}" id="img"> {!! Form::hidden('avatar',
                    $user->avatar) !!}

                    <div class="custom-file">
                        {!! Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'upload']) !!}
                        <label class="custom-file-label" style="width: 280px">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="profile-head">
                    <h1>
                        Thông tin cá nhân
                    </h1>
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
                    <input type="email" placeholder="E-mail" value="{{ $user->email }}" name="email" class="form-control mb-3 account" required>                @if ($errors->has('email'))
                    <p class="help-block validated" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </p>
                    @endif
                    <span class="role"><strong>Vai trò</strong></span><br>
                    <div class="custom-control custom-radio mb-3">
                        <span class="mr-5 ml-2">
                                    <input type="radio" id="customRadio1" name="role_id" value="1" class="custom-control-input" {{ $user->role_id == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio1">Admin</label>
                                </span>
                        <span>
                                    <input type="radio" id="customRadio2" name="role_id" value="2" class="custom-control-input" {{ $user->role_id == 2 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio1">Bác sỹ</label>
                                </span>
                    </div>
                    <span class="role"><strong>Nơi công tác</strong></span><br>
                    <input type="text" placeholder="Bệnh viện" value="{{ $user->company }}" name="company" class="form-control mb-3 account"
                        required>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Họ tên</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Họ tên" value="{{ $user->name }}" name="name" class="form-control mb-3 account" required>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->has('name'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Chức vụ</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Chức vụ" value="{{ $user->job }}" name="job" class="form-control mb-3 account" required>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Giới tính</strong></label>
                            </div>
                            <div class="col-md-6 pt-2">
                                <div class="custom-control custom-radio mb-3">
                                    <span class="mr-5 ml-2">
                                                <input type="radio" id="customRadio3" name="gender" value="male" class="custom-control-input" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio3">Nam</label>
                                            </span>
                                    <span>
                                                <input type="radio" id="customRadio4" name="gender" value="female" class="custom-control-input" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio4">Nữ</label>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Ngày sinh</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="birthday" value="{{ $user->birthday }}" class="form-control mb-3 account" required>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->has('birthday'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Địa chỉ thường trú</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="permanent_residence" value="{{ $user->permanent_residence }}" class="form-control mb-3 account"
                                    placeholder="Địa chỉ thường trú" required>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Địa chỉ tạm trú</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="staying_address" value="{{ $user->staying_address }}" class="form-control mb-3 account" placeholder="Địa chỉ tạm trú"
                                    required>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Số CMND</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="id_number" value="{{ $user->id_number }}" class="form-control mb-3 account" placeholder="CMND"
                                    required>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->has('id_number'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Ngày cấp</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="id_date" value="{{ $user->id_date }}" class="form-control mb-3 account" required>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->has('id_date'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('id_date') }}</strong>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Nơi cấp</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="id_address" value="{{ $user->id_address }}" class="form-control mb-3 account" placeholder="Nơi cấp"
                                    required>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-12 mb-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change_password" name="change_password">
                                    <label class="custom-control-label" for="change_password">Đổi mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-md-3 pt-2">
                                <label><strong>Mật khẩu</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control mb-3 account password" placeholder="Mật khẩu" disabled>
                            </div>
                            <div class="col-md-3">
                                @if ($errors->has('password'))
                                <p class="help-block validated" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                <label><strong>Xác nhận mật khẩu</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control mb-3 account password" placeholder="Xác nhận mật khẩu"
                                    disabled>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-md-3 pt-2">
                                {!! Form::submit('Lưu', ['class' => 'btn btn-success']) !!}
                            </div>
                            <div class="col-md-3 pt-2">
                                <a class="btn btn-danger delete" data-toggle="modal" href="#delete-{{$user->id}}">Xóa tài khoản</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="delete-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Xác nhận xóa</h4>
                    </div>
                    <div class="modal-body">
                        <h5>{{ __('translate.del_alert') }}</h5>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger mb-1">{{ __('translate.delete') }}</button> {!! Form::close()
                        !!}
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('translate.close') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // change password
        $('input#change_password').change(function() {
            if ($(this).is(':checked')) {
                $('.password').removeAttr('disabled');
            } else {
                $('.password').attr('disabled', '');
            }
        });
        // Avatar
        $(document).ready(function () {
            $('#upload').change( function () {
                $('#img').show();
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img').attr('src', e.target.result);
                        $('#img').css({"width" : "275px", "height" : "186px"});
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    $('#img').attr('src', '{{ asset('assets/images/' . $user->avatar) }}');
                }
            });
        });
    </script>
@stop
