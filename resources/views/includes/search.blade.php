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
        <form id="search-form" action="{{route('search')}}" method="GET">
            <div class="search-input">
                <div class="input-container">
                    <a id="search-link" href="#"><i class="fa fa-search"></i></a>
                    <input value="{{request()->input('search')}}" name="search" type="text" placeholder="Search for Product">                    
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("search-link").addEventListener('click', function(){
        document.getElementById("search-form").submit();
    });
</script>