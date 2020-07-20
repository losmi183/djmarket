@extends('layouts.app')

@section('title', $product->name)
    
@section('content')

    <div class="liner"></div>

    <div class="my-container">
        <section id="product-area">
            <div class="product-image">
                <img src="{{asset('img/products/'.$product->slug.'.jpg')}}" alt="">
            </div>
            <div class="product-details">
                <h1>{{$product->name}}</h1>
                <h2>{{$product->details}}</h2>
                <span class="in-stock">In stock</span>
                <h1 class="price">{{$product->presentPrice()}}</h1>
                <p class="description">{{$product->description}}</p>

                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button type="submit" class="button-dark">Add to Cart</button>                
                </form>

            </div>
        </section>
    </div>

    @include('includes.might-like')

</body>
</html>
    
@endsection