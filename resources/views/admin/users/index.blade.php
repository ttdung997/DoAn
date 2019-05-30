@extends('master')

@section('title', 'Danh sách người dùng')

@section('stylesheets')
    {{ Html::style('assets/css/dataTables/dataTables.bootstrap4.min.css') }}
    {{ Html::style('assets/css/dataTables/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    @include('layouts.notify')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Quản lý người dùng</div>

            </div>
            <div class="page-title-actions">
                <div class="btn-shadow mr-3 btn btn-dark">
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Số CMND</th>
                    <th>Địa chỉ</th>
                    <th>Chức vụ</th>
                    <th>Bệnh viện</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>MSBS00{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->birthday)) }}</td>
                        <td>{{ $user->id_number }}</td>
                        <td>{{ $user->id_address }}</td>
                        <td>{{ $user->job }}</td>
                        <td>{{ $user->company }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td><a href="{{ route('users.show', $user->id) }}">
                            <i class="fas fa-eye"></i>
                        </a></td>
                        <td><a href="{{ route('users.edit', $user->id) }}">
                            <i class="fas fa-pen"></i>
                        </a></td>
                        <td>
                            <a class="delete" data-toggle="modal" href="#delete-{{$user->id}}">
                                <i class="fas fa-trash"></i>
                            </a>
                            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                                <div class="modal fade" id="delete-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">{{ __('translate.del_confirm') }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{ __('translate.del_alert') }}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                                <button type="submit" class="btn btn-danger mb-1">{{ __('translate.delete') }}</button>
                                                {!! Form::close() !!}
                                                <button type="button" class="btn btn-light" data-dismiss="modal" >{{ __('translate.close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    {{ Html::script('assets/js/dataTables/jquery.dataTables.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.responsive.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.bootstrap4.min.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
