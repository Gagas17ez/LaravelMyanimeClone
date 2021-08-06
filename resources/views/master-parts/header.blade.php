<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="./index.html">
                        <img src="{{asset('template.anime/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Homepage</a></li>
                            <li><a href="#" class="search-switch">Search</a></li>
                            <li><a href="./categories.html">Genres <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach ($listgenre as $genre)
                                    <li href></li>    
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    @auth
                    <a href="./login.html"><span class="icon_profile"></span></a>
                    @endauth
                    @guest
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">Login</a>
                        @endif
                    @endauth
                    
                    

                    {{-- @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                        <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth 
                    </div>
                     @endif
                    <p><!--masukkan username disini--></p>--}}
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>