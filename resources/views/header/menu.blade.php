  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><a href="{{route('wishlist-view')}}"><span class="icon_heart_alt"></span>
                <div class="tip">{{$wishlistCount}}</div>
            </a></li>
            <li><a href="{{route('cart-view')}}"><span class="icon_bag_alt"></span>
                <div class="tip">{{$cartCount}}</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="/"><img src="img/logo.jpg" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
             @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 z-10">
                @auth
                    @if($usertype = Auth::user()->role=="admin")
                    <a href="{{ url('/redirects') }}">Dashboard</a>
                    @else
                    <a href="#">Hi, {{Auth::user()->name}}</a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault();
                                   this.closest('form').submit();"> Logout
                            </a>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" >Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="/"><h4 class="text-pink">Wunmi Thrift</h4><p>'N' More</p></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('cart-view')}}">Shop Cart</a></li>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contact-us')}}">Contact</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{route('my-orders')}}">My Orders</a></li>
                                    @endauth
                                @endif

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    @if($usertype = Auth::user()->role=="admin")
                                    <a href="{{ url('/redirects') }}">Dashboard</a>
                                    @else
                                    <a href="#">Hi, {{Auth::user()->name}}</a>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault();
                                                        this.closest('form').submit();">Logout
                                            </a>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" >Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                            @endif
                        </div>
                        <ul class="header__right__widget">
                            <li><a href="{{route('wishlist-view')}}"><span class="icon_heart_alt"></span>
                                <div class="tip">{{$wishlistCount}}</div>
                            </a></li>
                            <li><a href="{{route('cart-view')}}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$cartCount}}</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>