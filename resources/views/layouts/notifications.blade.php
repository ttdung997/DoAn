@extends('main')

@section('title', 'Thông báo')

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-9 mt-4">
                <div class="profile-img">
                    <h1 class="text-center">Thông báo</h1>
                </div>
            </div>
        </div>
        <div class="mt-5">
            {{-- @dd($user->notifications) --}}
            @foreach ($user->notifications as $notification)
                <div class="{{ $notification->read_at == null ? 'read' : 'readed' }}">
                    <a class="dropdown-item" href="{{ route('register-request.index') }}">
                        <div class="media">
                            <div class="media-left mr-2 pt-2">
                                <div class="media-object">
                                    <img src="{{ asset('assets/images/' . $notification->data['sender_avatar']) }}" width="42" height="42" class="rounded-circle" alt="{{ $notification->data['sender_name'] }}">
                                </div>
                            </div>
                            <div class="media-body">
                                <strong class="notification-title">{{ $notification->data['sender_name'] }}</strong>
                                <p class="notification">{{ $notification->data['message'] }}</p>
                                <i><small class="timestamp">{{ setTimeShort($notification->created_at) }}</small></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
