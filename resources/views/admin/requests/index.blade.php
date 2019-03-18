@extends('master')

@section('title', 'Danh sách yêu cầu')

@section('stylesheets')
    {{ Html::style('assets/css/dataTables/dataTables.bootstrap4.min.css') }}
    {{ Html::style('assets/css/dataTables/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-clipboard-list icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Manage Requests</div>
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
                        <th>Tên người yêu cầu</th>
                        <th>Ngày yêu cầu</th>
                        <th>Ngày hẹn trả</th>
                        <th>Ngày cấp phát</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($numberRequests as $key => $numberRequest)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $numberRequest->user->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($numberRequest->created_at)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($numberRequest->days_to_return)) }}</td>
                            <td>{{ $numberRequest->status == 1 ? date('d-m-Y', strtotime($numberRequest->updated_at)) : 'NULL' }}</td>
                            <td>{{ setStatus($numberRequest->status) }}</td>
                            <td class="text-center"><a href="{{ route('number-requests.edit', $numberRequest->id) }}"><i class="fas fa-eye mr-3"></i>Xem</a></td>
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
