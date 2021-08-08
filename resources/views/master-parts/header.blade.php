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
                            <li><a href="{{ route('users.index') }}">User List</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="">
                <nav class="header__menu mobile-menu">
                <ul class="">
                    @auth
                    <li><a href="#">{{ Auth::user()->name }}&emsp;<span class="icon_profile"></span></a>
                        <ul class="dropdown" style="background-color: #070720;">
                            @auth
                                @if (Auth::user()->status == "admin")
                                    <li class="dropdown-item"><a href="/anime/table" style="color: white">Show Anime</a></li>
                                    <li class="dropdown-item"><a href="/genre" style="color: white">Show Genre</a></li>
                                    <li class="dropdown-item"><a href="{{ route('anime.create') }}" style="color: white">Add Anime</a></li>
                                    
                                @endif
                                @if (is_null($profile))
                                <li class="dropdown-item"><a href="{{ route('profile.create') }}" style="color: white">Add Profile</a></li>
                                
                                @else
                                <li class="dropdown-item"><a href="{{ route('profile.create') }}" style="color: white">Edit Profile</a></li>
                                @endif
                                <li class="dropdown-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: white">
                                        {{ __('Logout') }}
                                </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            @endauth
                        </ul>
                    </li>
                    @endauth
                    @guest
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                        @if (Route::has('login'))
                        <li><a href="{{ route('login') }}">Login</a></li>
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
                </ul>
                </nav>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>