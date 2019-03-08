@extends('master')

@section('title', 'Danh sách chứng chỉ')

@section('stylesheets')
    {!! Html::style('assets/css/dataTables/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('assets/css/dataTables/css/responsive.bootstrap4.min.css') !!}
@endsection

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-certificate icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Manage Certificates</div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                        Inbox
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                        Book
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                        Picture
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                        File Disabled
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Serial Number</th>
                        <th>Thời hạn</th>
                        <th>Chủ sở hữu</th>
                        <th>Ngày tạo</th>
                        <th>Revoke</th>
                        <th>Xem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $key => $certificate)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $certificate->serial_number }}</td>
                            <td>{{ $certificate->expires }}</td>
                            <td>{{ $certificate->user_id }}</td>
                            <td>{{ $certificate->created_at }}</td>
                            <td><a href="#">Revoke</a></td>
                            <td><a href="#"><i class="far fa-eye"></i>Xem</a></td>
                        </tr>                    
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/dataTables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables/dataTables.bootstrap4.min.js') !!}
    {!! Html::script('assets/js/dataTables/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/js/dataTables/responsive.bootstrap4.min.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
