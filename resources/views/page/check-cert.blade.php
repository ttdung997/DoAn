<!-- Modal -->
<div class="modal fade" id="check-cert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload chứng thư muốn kiểm tra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'check-cert', 'files' => 'true']) !!}
            <div class="modal-body">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <input type="submit" class="btn btn-primary" value="Kiểm tra"/>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
