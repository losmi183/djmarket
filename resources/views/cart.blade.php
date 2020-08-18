@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="liner"></div>

    <div class="my-container cart-container">
        <section id="cart-area">
            
            @if (Cart::count() > 0)
                <h3 class="items-num"> {{Cart::count()}} item(s) in Shopping Cart</h3>

                <div class="cart-table">                
                    @foreach (Cart::content() as $item)   
                        <div class="cart-row">
                            <div class="cart-row-left">
                                <a href="{{route('shop.show', $item->model->slug)}}">
                                    <img height="100px" src="{{$item->model->image ? asset('storage/products/'.$item->model->image) : asset('img/no-image.jpg') }}">
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

                                    {{-- ADFSDFSDFSDF --}}

                                    <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-simple">Remove</button>
                                    </form>

                                    <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                                        @csrf
                                        <button class="button-simple">Save for Later</button>
                                    </form>

                                </div>

                                <form class="quantity-form" action=" {{route('cart.update', $item->rowId)}} " method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select class="quantity-select" name="quantity" data-id="{{$item->rowId}}">
                                        @for($i=1; $i<=10; $i++ )
                                            <option {{ $item->qty == $i ? 'selected' : '' }} value=" {{$i}} ">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </form>

                                {{-- <div class="product-price">{{formatPrice($item->price)}}</div> --}}
                                <div class="product-price">{{ presentPrice($item->subtotal) }}</div>
                            </div>{{-- cart-row-right  --}}                    
                        </div>  {{-- cart-row  --}}
                    @endforeach
                </div> {{-- cart-table  --}}                
            @else
                <p>No Items in Shopping Cart</p>   
                <div class="spacer"></div>
                <a class="button-dark" href="{{route('shop.index')}}">Continue Shopping</a>
            @endif

            <div class="spacer"></div>

            <div class="cart-totals">
                <div class="cart-totals-left">
                    <p>Shipping for all product above 200 euros is free. For smaller amounts price depend on your Country.     </p>      
                </div>
                <div class="cart-total-right">
                    <div>
                        Subtotal <br>
                        Tax <br>
                        <span id="test" data-id="test1">Total</span>
                    </div>
                    <div class="subtotal-total">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        {{ presentPrice(Cart::tax()) }} <br>
                        <span>{{ presentPrice(Cart::total()) }}</span>
                    </div>
                </div>
            </div>

            <div class="cart-buttons">
                <a href="{{route('shop.index')}}" class="button-dark">Continue Shopping</a>
                <a href="{{route('checkout.index')}}" class="button-primary">Procede to Checkout</a>
            </div>

            
            {{-- Save For Lates Section  --}}
            <div class="spacer my-5"></div>
            @include('includes.saveForLater');


        </section>
    </div>{{-- cart-container  --}}

    @include('includes.might-like')

</body>
</html>
    
@endsection

@section('extra-js')
<script src="js/app.js"></script>
<script>
    (function(){
        
            // Selecting all quantity-select-s and addin event listener
            const quantitySelect = document.querySelectorAll('.quantity-select');
       

            quantitySelect.forEach(element => {
                element.addEventListener('change', () => {

                    let id = element.getAttribute('data-id');
                    let qty = element.value;
                    
                    axios.patch('/cart/' + id, {
                        qty: qty
                    })
                    .then(function (response) {
                        console.log(response);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                })
            })      

        })()
    </script>
@endsection