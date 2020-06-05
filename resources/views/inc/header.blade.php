<header class="section-header">
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a class="navbar-brand logo_h" href="{{route('home')}}">
                            @if( Helper::setting()->has('logo') && !empty(setting('logo')) )
                                <img src="{{Storage::disk('public')->url(setting('logo'))}}" alt="" />
                            @endif
                        </a>
                    </div>
                    <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-sm-6">
                    <form action="{{ route('shop.search') }}" method="GET" class="search-wrap">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- search-wrap .end// -->
                </div>
                <!-- col.// -->
                <div class="col-lg-3 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            @if(Helper::cartCount()>0)
                                <a href="{{route('cart')}}" class="icontext">
                                    <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-shopping-cart"></i></div>
                                    <div class="text-wrap">
                                        <small>Cart</small>
                                        <span>{{Helper::cartCount()}}</span>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <!-- widget .// -->
                        <div class="widget-header dropdown">
                            <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-user"></i></div>
                                <div class="text-wrap">
                                    <span>@guest Login @endguest<i class="fa fa-caret-down"></i></span>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">

                                <!-- Authentication Links -->
                                @guest
                                    <form method="POST" action="{{ route('login') }}" class="px-4 py-3">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <div>
                                                <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div>
                                                <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('register') }}">Need an account? Sign up</a>
                                    @if (Route::has('password.request'))
                                        <a class="dropdown-item" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                @else
                                    <a class="dropdown-item" href="{{ route('account') }}">{{ Auth::user()->name }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item {{Request::path() === '/' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
      
                    @auth @if(Auth::user()->is_admin)
                        <li class="nav-item {{Request::path() === 'admin' ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('admin')}}">Admin</a>
                        </li>
                    @endif @endauth
      
                    @auth
                        <li class="nav-item {{Request::path() === 'account' ? 'active' : ''}}">
                            <a class="nav-link" href="{{route('account')}}">Account</a>
                        </li>
                    @endauth
      
                    <li class="nav-item {{Request::path() === 'shop' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('shop')}}">Shop</a>
                    </li>
    
                    <li class="nav-item {{Request::path() === 'post' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('post')}}">Blog</a>
                    </li>
    
                    <li class="nav-item {{Request::path() === 'contact' ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                            <a class="dropdown-item" href="#">Foods and Drink</a>
                            <a class="dropdown-item" href="#">Home interior</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Category 1</a>
                            <a class="dropdown-item" href="#">Category 2</a>
                            <a class="dropdown-item" href="#">Category 3</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- collapse .// -->
        </div>
        <!-- container .// -->
    </nav>

</header>