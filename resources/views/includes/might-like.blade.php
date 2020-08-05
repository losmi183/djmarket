

<div class="my-container">
    <div id="might-like">
        <h2>You might also like...</h2>
        <div class="might-like-images">

            @foreach ($mightLike as $product)
                <div class="box">
                    <div class="box-image">
                    <a href=" {{route('shop.show', $product->slug)}} ">
                        <img width="250px" src="{{asset('storage/products/'.$product->image)}}" alt="">
                    </a>
                    </div>
                    <a href=" {{route('shop.show', $product->slug)}} ">
                        <h5>{{ $product->name }}</h5>
                    </a>
                    <p>{{ $product->presentPrice() }}</p>
                </div>
            @endforeach

        </div>
    </div>
</div>