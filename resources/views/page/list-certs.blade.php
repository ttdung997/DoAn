@extends('main')

@section('title', 'Danh sách chứng thư')

@section('stylesheets')
    {{ Html::style('assets/css/dataTables/dataTables.bootstrap4.min.css') }}
    {{ Html::style('assets/css/dataTables/responsive.bootstrap4.min.css') }}
@endsection

@section('content')
    @include('layouts.notify')
	<div class="app-page-title">
        <h3 class="text-center">Quản lý chứng thư</h3>
    </div>
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Certificate</th>
                    <th>Ngày tạo</th>
                    <th>Status</th>
                    <th>Xem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $key => $certificate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ route('download', $certificate->id) }}">download</a></td>
                        <td>{{ $certificate->created_at }}</td>
                        <td>{{ setActive($certificate->status) }}</td>
                        <td><a href="{{ route('register-request.show', $certificate->id) }}"><i class="far fa-eye"></i>Xem</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        } );
    </script>
    {{ Html::script('assets/js/dataTables/jquery.dataTables.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.responsive.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.bootstrap4.min.js') }}
@endsection
