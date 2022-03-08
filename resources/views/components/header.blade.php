<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand mb-1 mb-lg-0" href="{{ route('home') }}">LOGO</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">{{ Auth::user() -> brand_name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endauth

                    {{-- dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Collabora Con Noi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @guest
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">Ristoranti Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Registra qui il tuo Ristorante</a></li>
                                <li><a class="dropdown-item" href="#">Rider Login</a></li>
                            @endguest
                            {{-- <li><hr class="dropdown-divider"></li> --}}
                            <li><a class="dropdown-item" href="#">Contatti</a></li>
                        </ul>
                    </li>
                    {{-- link to home --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    {{-- link to all restaurants --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants') }}">Ristoranti</a>
                    </li>
                    
                </ul>
                
                {{-- searchbar nav --}}
                {{-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-indigo" type="submit">Search</button>
                </form> --}}

            </div>

        </div>
      </nav>

      {{-- modal registration --}}
@include('pages.modal.login')
</header>