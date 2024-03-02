<nav class="navbar bg-body-tertiary fixed-top ">
    @auth
        <div class="container-fluid">

            <div class="image">
                <a class="nav-link d-inline" href="/profile/{{ Auth::user()->id }}">
                    {{ Auth::user()->name }}
                </a>
                <img src="{{ asset('user_profile/image/' . Auth::user()->image) }}" class="d-inline" alt="">

            </div>

            <div>
            @endauth
            @guest
                <div class="position-relative start-50">
                    @if (Route::has('login'))
                        <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>

            @endguest
        </div>
        <div class="row">
            <div class="col-6 pt-2">
                <input type="checkbox" class="theme-checkbox" id='toggleThemeBtn'>
            </div>
            <div class="col-6">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            @auth
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ Auth::user()->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            @endauth

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                                    {{ __('profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/admin/user">users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/user_subject">supgect</a>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/">studant</a>
                            </li>
                        @endif
                    @endguest

                </ul>
            </div>
        </div>
    </div>
</nav>
