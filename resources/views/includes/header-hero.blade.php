<header id="landing-image">
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

        <div class="hero">
            <div class="hero-titles">
                <h1>Dj Market | Shopping Solution | Remote</h1>
                <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration. </p>
                <a href="#" class="button-light">Github</a>
                <a href="#" class="button-light">Linkedin</a>
            </div>
            <div class="hero-image">
                <img src="img/showcase-2.png" alt="Cdj 2000 Nexus">
            </div>
        </div>

    </div>
</header>