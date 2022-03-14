<header>
    <nav  class="navbar fixed-top navbar-expand-lg">
        <div class="container">
            {{-- toggle menu in mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- noome e logo --}}
            <div class="navbar-brand">
                <a class="d-flex" href="{{ route('home') }}"> 
                    <img class="img" src="/storage/asset/Kokolivery-logo.svg">
                    <h4 class="h4 align-self-center">Kokolivery</h4>
                </a>
            </div>
            {{-- sezione che collapse --}}
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mb-lg-0">

                    {{-- nome ristorante --}}
                    @auth
                        <button class="btn me-3">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link black">{{ Auth::user()->brand_name }}</a>
                            </li>
                        </button>
                  
                    @endauth
                    
                    {{-- link to home --}}
                    <button class="btn me-3" >
                        <li class="nav-item">
                            <a class="nav-link black" href="{{ route('home') }}">Home</a>
                        </li>
                    </button>
                    {{-- link to all restaurants --}}
                    <button class="btn me-3">
                        <li class="nav-item">
                            <a class="nav-link black" href="{{ route('restaurants') }}">Ristoranti</a>
                        </li>
                    </button>

                    {{-- dropdown --}}
                    <li class="nav-item dropdown ">
                        <button class="btn me-3">
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
                                <li>
                                    <a class="dropdown-item" href="#">Contatti</a>
                                </li>

                                <li >
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script type="application/javascript">
        $(function() {
            var navbar = $(".navbar");
            var brand = $(".navbar-brand>a");
            var brandImg = $(".navbar-brand>a>.img");
            var buttonNav = $(".btn.me-3");
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 50) {
                    navbar.addClass("background-scroll-change");
                    brand.addClass("text-light");
                    brandImg.addClass("d-block");
                    buttonNav.addClass("indigo");
                    
                } else {
                    navbar.removeClass("background-scroll-change");
                    brand.removeClass("text-light");
                    brandImg.removeClass("d-block");
                    buttonNav.removeClass("indigo");

                }
            });
        });
    </script>

    {{-- modal registration --}}
    @include('pages.modal.login')
</header>