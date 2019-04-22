<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
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
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('users.index') }}" class="mm-active">
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">List</li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="metismenu-icon fas fa-users-cog"></i>
                        Quản lý người dùng
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="metismenu-icon"></i>Danh sách người dùng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}">
                                <i class="metismenu-icon"></i>Tạo người dùng
                            </a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="{{ route('certificates.index') }}">
                        <i class="metismenu-icon fas fa-certificate"></i>Quản lý chứng thư
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('certificates.index') }}">
                                <i class="metismenu-icon"></i>Danh sách chứng thư
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('number-requests.index') }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>Quản lý yêu cầu
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('number-requests.index') }}">
                                <i class="metismenu-icon"></i>Danh sách yêu cầu
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
