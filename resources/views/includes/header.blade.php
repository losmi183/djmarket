<header id="header-simple">
    <div class="my-container header">
        <div class="nav">
            <div class="logo">
                <a href="{{route('landing-page')}}">
                    <img width="70px" src="img/logo-color.png" alt="">
                </a>
            </div>
            <ul id="nav-links">
                <li><a href="{{route('shop.index')}}">Shop</a></li>
                <li>About</li>
                <li>Blog</li>
                <li><a href="{{route('cart.index')}}">Cart 
                    @if (Cart::instance('default')->count() > 0)
                        <span class="cart-counter">{{ Cart::count() }}</span>
                    @endif
                </a></li>
            </ul>
        </div>   
    </div>
</header>