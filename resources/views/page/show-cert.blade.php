<!-- Modal -->
<div class="modal fade" id="cert_{{ $certificate->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thông tin chứng thư</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h5 class="ml-4 pl-2">Subject Name</h5>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>C (Country):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['C'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>ST (State):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['ST'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>L (Locality):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['L'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>O (Organization):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['O'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>CN (Common Name):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['CN'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>EMAIL (Email Address):</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['subject']['emailAddress'] }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5 class="mt-3 ml-4 pl-2">Issued Certificate</h5>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>Version:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ openssl_x509_parse($certificate->certificate)['version'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>Serial Number:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ serialNumberHex($certificate->serial_number) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>Not Valid Before:</strong></span>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ $certificate->valid_from_time }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3 ml-5">
                        <span><strong>Not Valid After:</strong></span>
                    </div>
                    <div class="col-md-3 mt-3">
                        <p>{{ $certificate->valid_to_time }}</p>
                    </div>
                    @if (strtotime($certificate->valid_to_time) < time())
                        <div class="col-md-3 mt-3">
                            <strong><span class="warning-time">(Hết hiệu lực)</span></strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <h5 class="mt-3 ml-4 pl-2">Status</h5>
                </div>
                <div class="custom-control custom-radio mb-3">
                    @if ($certificate->status == 0)
                        <span class='badge badge-pill badge-success ml-4'>Active</span>
                    @elseif ($certificate->status == 1)
                        <span class='badge badge-pill badge-danger ml-4'>Thu hồi</span>
                    @else
                        <span class='badge badge-pill badge-warning ml-4'>Pending</span>
                    @endif
                </div>
                {!! Form::hidden('message', 'Yêu cầu thu hồi chứng thư') !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-info" id="request" style="display: none;">Gửi yêu cầu</button>
            </div>
        </div>
    </div>
</div>
