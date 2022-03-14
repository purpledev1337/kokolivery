<header>
    <nav class="navbar fixed-top navbar-expand-lg sfumatura_header">
        <div class="container-fluid centratura-logonav">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand mb-1 mb-lg-0 logonavbase black" href="{{ route('home') }}"> <img
                    class="logonav" src="/storage/asset/Kokolivery-logo.svg"> Kokolivery</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @auth
                        <button class="btn btn-collabora">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link black">{{ Auth::user()->brand_name }}</a>
                            </li>
                        </button>
                        <button class="btn btn-collabora">
                            <li class="nav-item ">
                                <a class="nav-link black" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </button>
                    @endauth
                    <form class="form-inline hoverkoko">
                        {{-- <input @keyup.enter.prevent="searchRestaurantsFromCity" type="text" placeholder="Inserisci La Via, La Citta' E La Provincia" v-model="city"> --}}
                        {{-- <button @click.prevent="searchRestaurantsFromCity"  class="btn btn-primary" >SEARCH</button> --}}
                    </form>

                    {{-- dropdown --}}
                    <li class="nav-item dropdown ">
                        <button class="btn btn-collabora">
                            <a class="nav-link dropdown-toggle black" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Collabora Con Noi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @guest
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal"
                                            href="#">Ristoranti Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Registra qui il tuo
                                            Ristorante</a></li>
                                    <li><a class="dropdown-item" href="{{ route('rider') }}">Rider Login</a></li>
                                @endguest
                                {{-- <li><hr class="dropdown-divider"></li> --}}
                                <li><a class="dropdown-item" href="#">Contatti</a></li>
                            </ul>
                        </button>
                    </li>

                    {{-- link to home --}}
                    <button class="btn btn-collabora">
                        <li class="nav-item">
                            <a class="nav-link black" href="{{ route('home') }}">Home</a>
                        </li>
                    </button>
                    {{-- link to all restaurants --}}
                    <button class="btn btn-collabora">
                        <li class="nav-item">
                            <a class="nav-link black" href="{{ route('restaurants') }}">Ristoranti</a>
                        </li>
                    </button>

                </ul>
            </div>
        </div>
    </nav>


    {{-- modal registration --}}
    @include('pages.modal.login')
</header>
