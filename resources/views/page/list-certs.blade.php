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
                    <th class="text-center" colspan="2">Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $key => $certificate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if ($certificate->status == 0)
                                <a data-toggle="modal" data-target="#cert_{{ $certificate->id }}" href="{{ route('register-request.show', $certificate->id) }}">Certificate_{{ $key + 1 }}</a>
                            @else
                                Certificate_{{ $key + 1 }}
                            @endif
                        </td>
                        <td>{{ $certificate->created_at }}</td>
                        <td>{{ setActive($certificate->status) }}</td>
                        @if ($certificate->status == 0)
                            <td class="text-center"><a href="{{ route('download-cert', $certificate->id) }}"><i class="fas fa-cloud-download-alt"></i> Certificate</a></td>
                            <td class="text-center"><a href="{{ route('download-pkcs12', $certificate->id) }}"><i class="fas fa-cloud-download-alt"></i> PKCS12</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('page.show-cert')
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
            $('input[name=status]').click(function() {
                var status = $('input[name=status]:checked').val();
                if (status == 0) {
                    $('#request').css('display', 'none');
                } else {
                    $('#request').css('display', 'block');
                }
            });

        } );
    </script>
    {{ Html::script('assets/js/dataTables/jquery.dataTables.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.responsive.min.js') }}
    {{ Html::script('assets/js/dataTables/dataTables.bootstrap4.min.js') }}
@endsection
