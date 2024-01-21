<nav class="navbar navbar-expand-lg  bg-dark " data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Short Link</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto m-auto mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            <form class="d-flex" role="search">
                @auth
                    <p class="my-auto mx-2">{{ Auth::user()->name }}</p>
                    <a href="{{ route('logout') }}" class="btn mx-1 btn-danger">Logout</a>
                @endauth
                @if (!Auth::user())
                    <a href="{{ route('login') }}" class="btn mx-1 btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn mx-1 btn-secondary">Register</a>
                @endif

            </form>
        </div>
    </div>
</nav>