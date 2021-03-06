<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="header-admin">Admin</div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group mr-3">
                                <a id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-count="0" class="far fa-bell"></i>
                                    <sup class="badge badge-pill badge-danger active-notification" id="notification">
                                        <span>{{ count(Auth::user()->unreadNotifications) }}</span>
                                    </sup>
                                </a>
                                @if (count(Auth::user()->unreadNotifications) > 0)
                                    <div class="dropdown-menu notification" aria-labelledby="notification" id="notificationsMenu">
                                        <div class="mark-as-read">
                                            <a href="{{ route('marks') }}" data-id="mark">Đánh dấu đã đọc</a>
                                        </div>
                                        <hr class="hr-read">
                                        @foreach (Auth::user()->unreadNotifications()->take(4)->get() as $notification)
                                            <div class="{{ $notification->read_at == null ? 'read' : 'readed' }}">
                                                <a class="dropdown-item" href="{{ $notification->data['message'] == 'Xin cấp chứng thư tạm thời' ? route('intro-requests.edit', $notification->data['request_id']) : route('number-requests.edit', $notification->data['request_id']) }}">
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
                                            </div>
                                            <hr class="hr-read">
                                        @endforeach
                                        <a href="{{ route('number-requests.index') }}" class="see-all"><div class="text-center">Xem tất cả</div></a>
                                    </div>
                                @else
                                    <div class="dropdown-menu notification" aria-labelledby="notification">
                                        <a class="dropdown-item" href="#">
                                            <div class="media-body">
                                                {{ __('Không có thông báo mới') }}
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    @if (isset(Auth::user()->avatar))
                                        <img width="42" height="42" class="rounded-circle" src="{{ asset('assets/images/' . Auth::user()->avatar) }}" alt="Admin">
                                    @else
                                        <img width="42" class="rounded-circle" src="{{ config('view.image_paths.avata_default') }}" alt="Doctor">
                                    @endif
                                    <i class="fas fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <a tabindex="0" class="dropdown-item" href="{{ route('users.show', Auth::id()) }}"><i class="fas fa-user-md mr-1"></i>Tài khoản</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{ route('admin.logout') }}" tabindex="0" class="dropdown-item"><i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="widget-subheading">
                                {{ Auth::user()->role->name }}
                            </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fas fa-calendar-alt pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
