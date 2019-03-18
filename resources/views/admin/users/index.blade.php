@extends('master')

@section('title', 'Danh sách người dùng')

@section('stylesheets')
    {{ Html::style('assets/css/dataTables/dataTables.bootstrap4.min.css') }}
    {{ Html::style('assets/css/dataTables/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Manage Users</div>
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
                            <td><a href="#">
                                <i class="fas fa-pen"></i>
                            </a></td>
                            <td><a href="#">
                                <i class="fas fa-trash"></i>
                            </a></td>
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
    {{ Html::script('assets/js/dataTables/responsive.bootstrap4.min.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
