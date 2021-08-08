<header class="header">
    <div class="container">
        <div class="d-flex justify-content-around">
            <div class="">
                <div class="header__logo">
                    <a href="/anime">
                        <img src="{{asset('template.anime/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul style="background-color: #070720;">
                            <li><a href="/anime">Homepage</a></li>
                            <li><a href="#" class="search-switch">Search</a></li>
                            <li><a href="#">Genres <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown" style="background-color: #070720">
                                    @foreach ($listgenre as $genre)
                                    <li value="{{$genre->id}}" class="dropdown-item" style="color: white">{{$genre->genre}}</li>    
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
                    <li id="dropdownmain"><a href="#">{{ Auth::user()->name }}&emsp;<img src="{{asset('profilepic/'.$profile->profile_pic)}}" alt="profilepicture" class="rounded-circle m-0" width="19px" height="19px"></a>
                        <ul class="dropdown" style="background-color: #070720;">
                            @auth
                                @if (Auth::user()->status == "admin")
                                    <li class="dropdown-item"><a href="/anime/table" style="color: white; white-space:pre;"><i class="fa fa-film" aria-hidden="true"></i>&#09;Show Anime</a></li>
                                    <li class="dropdown-item"><a href="/genre" style="color: white; white-space:pre;"><i class="fa fa-bookmark" aria-hidden="true"></i>&#09;Show Genre</a></li>
                                    {{-- <li class="dropdown-item"><a href="{{ route('anime.create') }}" style="color: white">Add Anime</a></li>
                                    <li class="dropdown-item"><a href="/genre/create" style="color: white">Add Genre</a></li> --}}
                                    
                                @endif
                                @if (is_null($profile))
                                <li class="dropdown-item"><a href="{{ route('profile.create') }}" style="color: white; white-space:pre;"><i class="fa fa-plus" aria-hidden="true"></i>&#09;Add Profile</a></li>
                                
                                @else
                                <li class="dropdown-item"><a href="{{ route('profile.create') }}" style="color: white; white-space:pre;"><i class="fa fa-pencil" aria-hidden="true"></i>&#09;Edit Profile</a></li>
                                @endif
                                <li class="dropdown-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: white; white-space:pre;"><i class="fa fa-sign-out" aria-hidden="true"></i>&#09;{{ __('Logout') }}</a></li>

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