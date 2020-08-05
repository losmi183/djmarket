@extends('layouts.app')

@section('title', $product->name)
    
@section('content')

    <div class="liner"></div>

    <div class="my-container">
        <section id="product-area">
            <div class="images-area">
                <div class="product-image">
                    <img id="main-image" src="{{ $product->image ? asset('storage/products/'.$product->image) : asset('img/no-image.jpg') }}" alt="">
                </div>

                <div class="other-images">
                    @if ($images)
                        @foreach ($images as $image)
                        <div class="small-image">
                            <img class="small-images" height="80px" src="{{ asset('storage/products/'.$image) }}" alt="">
                        </div>
                        @endforeach
                    @endif
                </div>

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

@section('extra-js')
    <script>
        let mainImage = document.getElementById("main-image");
        let smallImages = document.getElementsByClassName("small-images");

        Array.from(smallImages).forEach(function(item){
            item.addEventListener('click', function(){
                let img = mainImage.src;
                mainImage.src = this.src;
                this.src = img;
            });
        });

    </script>
@endsection