@if (Session::has('success'))
    <div class="notify success" id="success" data="{{ Session::get('success') }}">
    </div>
@elseif (Session::has('error'))
    <div class="notify error" id="error" data="{{ Session::get('error') }}">
    </div>
@endif
