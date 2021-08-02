<header>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <ul class="nav justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">{{__('Home')}}</a>
                </li>
                @if ( null !== Auth::user() and (Auth::user()->is_admin or Auth::user()->id == 2))
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropDownUsersButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Users
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropDownUsersButton">
                                @foreach(\App\Models\User::all() as $user)
                                    <li>
                                        <a href="{{ route('profile.show', ['user' => $user->first_name]) }}" class="dropdown-item">{{$user->first_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @if( !Request::is('admin') )
                        <li class="nav-item">
                            <a href="{{ route('admin.panel') }}" class="nav-link">Admin pannel</a>
                        </li>
                    @endif
                @endif
            </ul>
            <ul class="nav justify-content-md-end">
                <!-- Authentication Links -->
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
                    @if ( null !== Auth::user() and (Auth::user()->id == 2) and (Request::is('(text|video|category)]/*') and !Request::is('(text|video|category)]/*/edit')))
                        <li class="nav-item">
                            <a href="#" class="nav-link">Edit
                                @switch(Request::path())
                                    @case('(text|video)/*')
                                    post
                                    @break

                                    @case('category/*')
                                    category
                                    @break

                                    @default item
                                @endswitch</a>
                        </li>
                    @endif
                    <li class="nav-item color-mode__nav-element">
                        <button class="btn btn-secondary color-mode__button" type="button" data-current-theme="light">
                            <i class="color-mode__icon bi bi-x-diamond-fill text-dark"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownProfileMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownProfileMenuButton">
                                <li><a href="{{route('profile.show')}}" class="dropdown-item">Profile</a></li>

                                <li><a class="dropdown-item bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                </li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
