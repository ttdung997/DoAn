@extends('master')

@section('title', 'Danh sách chứng chỉ')

@section('stylesheets')
    {{ Html::style('assets/css/dataTables/dataTables.bootstrap4.min.css') }}
    {{ Html::style('assets/css/dataTables/responsive.bootstrap4.min.css') }}
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
    {{ Html::script('assets/js/dataTables/jquery.dataTables.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.responsive.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.bootstrap4.min.js') }}
    {{ Html::script('assets/js/dataTables/responsive.bootstrap4.min.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
