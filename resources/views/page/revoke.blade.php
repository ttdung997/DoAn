<!-- Modal -->
<div class="modal fade" id="revoke" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yêu cầu thu hồi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'revoke', 'id' => 'revoke-cert']) !!}
            <div class="modal-body">
                <div class="custom-file">
                    <input type="text" class="form-control" name="reason" placeholder="Lý do muốn thu hồi" required>
                    @if ($errors->has('reason'))
                        <p class="help-block validated" role="alert">
                            {{ $errors->first('reason') }}
                        </p>
                    @endif
                </div>
                {!! Form::hidden('message', 'Yêu cầu thu hồi chứng thư') !!}
                {!! Form::hidden('user_id', Auth::id()) !!}
                {!! Form::hidden('type', 0) !!}
                {!! Form::hidden('status', 3) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <input type="submit" class="btn btn-success" value="Gửi yêu cầu"/>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
