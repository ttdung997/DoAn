@extends('master')

@section('title', 'Danh sách yêu cầu')

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
                    <i class="fas fa-clipboard-list icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Quản lý yêu cầu</div>
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
                    <th>Người yêu cầu</th>
                    <th>Yêu cầu</th>
                    <th>Ngày yêu cầu</th>
                    <th>Ngày xử lý</th>
                    <th>Trạng thái</th>
                    <th>Xem chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($numberRequests as $key => $numberRequest)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $numberRequest->user->name }}</td>
                        <td>{{ $numberRequest['request_of_user']['message'] }}</td>
                        <td>{{ date('d-m-Y', strtotime($numberRequest->created_at)) }}</td>
                        <td>{{ ($numberRequest->status != 0 && $numberRequest->status != 3) ? date('d-m-Y', strtotime($numberRequest->updated_at)) : 'NULL' }}</td>
                        <td>{{ setStatus($numberRequest->status) }}</td>
                        <td>
                            @if (isset($numberRequest->request_of_user['type']) && $numberRequest->request_of_user['type'] == 1)
                                <a href="{{ route('intro-requests.edit', $numberRequest->id) }}"><i class="fas fa-eye mr-3"></i>Xem</a>
                            @else
                                <a href="{{ route('number-requests.edit', $numberRequest->id) }}"><i class="fas fa-eye mr-3"></i>Xem</a>
                            @endif
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
        } );
    </script>
@endsection
