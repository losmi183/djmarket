<div class="my-container">
    <div class="search">
        <div class="breadcr">
            <a href="{{route('landing-page')}}">Home</a>
            > 
            <a href="{{route('shop.index')}}">Shop</a>
            
            @if (Route::current()->getName() == 'shop.show')
                >
                <a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a>
            @endif

        </div>
        <div class="search-input">
            <div class="input-container">
                <a href="#"><i class="fa fa-search"></i></a>
                <input type="text" placeholder="Search for Product">
            </div>
        </div>
    </div>
</div>