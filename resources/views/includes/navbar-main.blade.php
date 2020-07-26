<ul id="nav">
    
    <div class="nav-left">

        <div class="logo">
            <a href="{{route('landing-page')}}">
                <img width="70px" src="img/logo-color.png" alt="">
            </a>
        </div>

        <li><a href="{{route('shop.index')}}">Shop</a></li>
        <li><a href=" {{route('about')}} ">About</a></li>
        <li>Blog</li>
    </div>

    <div class="nav-right">
        <!-- Authentication Links -->
        @guest
            <li>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest

        <li><a href="{{route('cart.index')}}">Cart 
            @if (Cart::instance('default')->count() > 0)
                <span class="cart-counter">{{ Cart::count() }}</span>
            @endif
        </a></li>

    </div>


</ul>

