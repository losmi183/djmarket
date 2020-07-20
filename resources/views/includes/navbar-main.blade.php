<ul id="nav-links">
    <li><a href="{{route('shop.index')}}">Shop</a></li>
    <li><a href=" {{route('about')}} ">About</a></li>
    <li>Blog</li>
    <li><a href="{{route('cart.index')}}">Cart 
        @if (Cart::instance('default')->count() > 0)
            <span class="cart-counter">{{ Cart::count() }}</span>
        @endif
    </a></li>
</ul>