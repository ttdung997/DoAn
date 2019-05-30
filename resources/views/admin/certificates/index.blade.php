@extends('master')

@section('title', 'Danh sách chứng chỉ')

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
                    <i class="fas fa-certificate icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Quản lý chứng thư</div>
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
                    <th>SubjectDN</th>
                    <th>Serial Number</th>
                    <th>Ngày tạo</th>
                    <th>Hiệu lực đến</th>
                    <th>Chủ sở hữu</th>
                    <th>Status</th>
                    <th>Xem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $key => $certificate)
                    @php
                        $subjectDN = '';
                        foreach (openssl_x509_parse($certificate->certificate)['subject'] as $k => $value) {
                            if ($k == 'emailAddress') {
                                $subjectDN .= $k . '=' . $value;
                            } else {
                                $subjectDN .= $k . '=' . $value . ', ';
                            }
                        }
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $subjectDN }}</td>
                        <td>{{ serialNumberHex($certificate->serial_number) }}</td>
                        <td>{{ date('d-m-Y', strtotime($certificate->created_at)) }}</td>
                        <td>
                            @if (strtotime($certificate->valid_to_time) < time())
                                {!! date('d-m-Y', strtotime($certificate->valid_to_time)) !!}
                                <strong><p class="warning-time">(Hết hiệu lực)</p></strong>
                            @else
                                {!! date('d-m-Y', strtotime($certificate->valid_to_time)) !!}
                            @endif
                        </td>
                        <td>{{ $certificate->user->name }}</td>
                        <td>{{ setActive($certificate->status) }}</td>
                        <td><a href="{{ route('certificates.show', $certificate->id) }}"><i class="far fa-eye"></i>Xem</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
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
