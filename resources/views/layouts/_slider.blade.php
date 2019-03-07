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
                    <a href="/" class="mm-active">
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">List</li>
                <li>
                    <a href="/">
                        <i class="metismenu-icon fas fa-users-cog"></i>
                        Manage Users
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>List Users
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>Create User
                            </a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-certificate"></i>Manage Certificates
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('certificates') }}">
                                <i class="metismenu-icon"></i>List Certificates
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>Create Certificate
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>Manage Requests
                        <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('requests') }}">
                                <i class="metismenu-icon"></i>List Requests
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>Create Request
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>