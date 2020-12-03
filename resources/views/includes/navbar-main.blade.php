<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <a class="navbar-brand" href="{{route('landing-page')}}"><img width="70px" src="/img/logo-color.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav mr-auto">        
      <li class="nav-item"><a class="nav-link" href="{{route('shop.index')}}">Shop</a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
      
      @if ( isCustomer() )
        <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">My Orders</a></li>          
      @else
        <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">Admin</a></li>   
      @endif

    </ul>
        
    <ul class="navbar-nav ml-auto">
        
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest

        <li class="nav-item"><a class="nav-link" href="{{route('cart.index')}}">Cart
            @if (Cart::instance('default')->count() > 0)
                <span class="cart-counter">{{ Cart::count() }}</span>
            @endif
        </a></li>    
    </ul>

  </div>
</nav>