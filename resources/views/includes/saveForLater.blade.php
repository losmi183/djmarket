@if (Cart::instance('saveForLater') )
    <h3 class="items-num"> {{Cart::instance('saveForLater')->count()}} item(s) saved for later</h3>

    <div class="cart-table">                
        @foreach (Cart::instance('saveForLater')->content() as $item)   
            <div class="cart-row">
                <div class="cart-row-left">
                    <a href="{{route('shop.show', $item->model->slug)}}">
                        <img height="100px" src="{{asset('storage/products/'.$item->model->image)}}">
                    </a>
                    <span class="product-basic-info">
                        <a href="{{route('shop.show', $item->model->slug)}}">
                            <h3 class="cart-table-item">{{$item->name}}</h3>
                        </a>
                        <div class="cart-table-description">{{$item->description}}</div>
                    </span>
                </div>{{-- cart-row-left  --}}

                <div class="cart-row-right">
                    <div class="cart-actions">

                        <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-simple">Remove</button>
                        </form>

                        <form action="{{route('saveForLater.backToCart', $item->rowId)}}" method="POST">
                            @csrf
                            <button class="button-simple">Back to Cart</button>
                        </form>

                    </div>
                    <select class="quantity-select" name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                    {{-- <div class="product-price">{{formatPrice($item->price)}}</div> --}}
                    <div class="product-price">{{$item->model->presentPrice()}}</div>
                </div>{{-- cart-row-right  --}}                    
            </div>  {{-- cart-row  --}}
        @endforeach
    </div> {{-- cart-table  --}}            
@else 
    You Have no Items saved for later
@endif