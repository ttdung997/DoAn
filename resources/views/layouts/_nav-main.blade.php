<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand text-light" href="{{ url('/') }}"><i class="fas fa-home"></i> Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#demo-navbar" aria-controls="demo-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="demo-navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-light" href="{{ route('register-request.create') }}" title="Đăng ký chứng thư"><i class="far fa-registered"></i> Đăng ký<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register-request.index') }}" title="Chứng thư"><i class="fas fa-award"></i> Chứng thư</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" data-toggle="modal" data-target="#revoke" title="Thu hồi chứng thư">
                    <i class="fas fa-torah"></i> Thu hồi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" data-toggle="modal" data-target="#check-cert" title="Kiểm tra chữ ký"><i class="fas fa-check-circle"></i> Kiểm tra chứng thư</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-5 pr-3">
            <li class="dropdown mr-4 mt-2">
                <a id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-count="0" class="fas fa-bell noti-color"></i>
                    <sup class="badge badge-pill badge-danger active-notification" id="notification">
                        <span>{{ count(Auth::user()->unreadNotifications) }}</span>
                    </sup>
                </a>
                @if (count(Auth::user()->unreadNotifications) > 0)
                    <div class="dropdown-menu" aria-labelledby="notification">
                        @foreach (Auth::user()->unreadNotifications()->take(4)->get() as $notification)
                            <a class="dropdown-item" href="{{ route('register-request.index') }}">
                                <div class="media">
                                    <div class="media-left mr-2">
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
                            <hr style="border: 1px solid #f7f8fa">
                        @endforeach
                        <a href="#"><div class="text-center">Xem tất cả</div></a>
                    </div>
                @else
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <a class="dropdown-item" href="#">
                            <div class="media-body">
                                {{ __('Không có thông báo') }}
                            </div>
                        </a>
                    </div>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (isset(Auth::user()->avatar))
                    <img width="30" height="30" class="rounded-circle" src="{{ asset('assets/images/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                    @else
                    <img width="30" height="30" class="rounded-circle" src="{{ asset('assets/images/' . config('view.image_paths.avata_default')) }}" alt="Doctor">
                    @endif
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user-md mr-1"></i>Tài khoản</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
    @include('page.check-cert')
    @include('page.revoke')
</nav>
