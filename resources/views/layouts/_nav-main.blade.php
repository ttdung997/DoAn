<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand text-light" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#demo-navbar" aria-controls="demo-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="demo-navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-light" href="{{ url('/') }}">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">About</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-5 pr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (isset(Auth::user()->avatar))
                    <img width="30" height="30" class="rounded-circle" src="{{ asset('assets/images/' . Auth::user()->avatar) }}" alt="Admin">
                    @else
                    <img width="30" height="30" class="rounded-circle" src="{{ config('view.image_paths.avata_default') }}" alt="Doctor">
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
</nav>
