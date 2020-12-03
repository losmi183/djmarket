

<div class="my-container">
    <div id="might-like">
        <h2>You might also like...</h2>
        <div class="might-like-images">

            @foreach ($mightLike as $product)
                <div class="box2">
                    <a href="{{route('shop.show', $product->slug)}}">
                        <div class="box2-image">
                                <img src="{{$product->image ? asset('storage/products/'.$product->image) : asset('/img/no-image.jpg') }}">
                            <div class="icons-wrapper">
                                <a title="Add product to wish list" href="#">
                                    <div class="icon"><i class="far fa-heart"></i></div>
                                </a>
                                <a title="View product details" href="{{route('shop.show', $product->slug)}}">
                                    <div class="icon"><i class="fas fa-eye"></i></div>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('shop.show', $product->slug)}}"><h5>{{$product->name}}</h5></a>
                    <p>{{$product->presentPrice()}}</p>
                </div>
            @endforeach

        </div>
    </div>
</div>