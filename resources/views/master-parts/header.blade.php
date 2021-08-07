<header class="header">
    <div class="container">
        <div class="d-flex justify-content-around">
            <div class="">
                <div class="header__logo">
                    <a href="./index.html">
                        <img src="{{asset('template.anime/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="/anime">Homepage</a></li>
                            <li><a href="#" class="search-switch">Search</a></li>
                            <li><a href="#">Genres <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach ($listgenre as $genre)
                                    <li value="{{$genre->id}}">{{$genre->genre}}</li>    
                                    @endforeach
                                    
                                </ul>
                            </li>
                            @auth
                            <li><a href="{{ route('anime.create') }}">Add Anime</a></li>
                            
                            <li><a href="{{ route('profile.create') }}">Add Profile</a></li>
                            
                            <li><a href="/profile#">Edit Profile</a></li>
                            
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="">
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