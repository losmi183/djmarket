@extends('layouts.app-landing')

@section('title', 'Home Page')
    
@section('content')   

<section id="landing-random">
    <div class="my-container">
        <h1 class="landing-caption mb-4">Some of our products</h1>
        {{-- <p class="landing-text">Product at this App are examples with fictive price.</p>
        <p>You are welcome to check our example products, test cart and coupons and checkout with example card number</p>
        
        
        <div class="begin-buttons">
            <a href=" {{route('shop.index')}} " class="button-dark">Featured</a>
            <a href="{{route('shop.index')}}" class="button-dark">On Sale</a>
        </div> --}}

        <div class="random-products">

            @foreach ($products as $product)
                <div class="box">
                    <div class="box-image">
                        <a href="{{route('shop.show', $product->slug)}}">
                            <img src="{{asset('storage/products/'.$product->image)}}" alt="">
                        </a>
                    </div>
                    <a href="{{route('shop.show', $product->slug)}}"><h5>{{$product->name}}</h5></a>
                    <p>{{$product->presentPrice()}}</p>
                </div>
            @endforeach
            
        </div>

        <div class="text-center">
            <a href="{{route('shop.index')}}" class="button-dark">View more Products</a> 
        </div>

    </div>
</section>

{{-- <div class="spacer"></div>--}}
<div class="liner"></div> 

<section id="landing-blog">
    <div class="my-container">
        <h1 class="landing-caption">From Our Blog</h1>
        <p class="landing-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam blanditiis sapiente laudantium magni rem recusandae iure at fugit ex reiciendis autem, quod quos fuga amet, excepturi, facere exercitationem! Voluptatibus, esse?</p>

        <div class="lastest-blogs">
            <div class="box">
                <div class="box-image" style="min-height: 350px">
                    <img width="400px" src="img/blog/blog-1.jpg" alt="">
                </div>
                <h3>Headphones Big test 2020</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam inventore praesentium, voluptatem consectetur adipisci ipsum.</p>
            </div>
    
            <div class="box">
                <div class="box-image" style="min-height: 350px">
                    <img width="400px" src="img/blog/blog-2.png" alt="">
                </div>
                <h3>Stories From studio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam inventore praesentium, voluptatem consectetur adipisci ipsum.</p>
            </div>
    
            <div class="box">
                <div class="box-image" style="min-height: 350px">
                    <img width="400px" src="img/blog/blog-3.jpg" alt="">
                </div>
                <h3>Controllers Big test 2020</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam inventore praesentium, voluptatem consectetur adipisci ipsum.</p>
            </div>
        </div>

    </div>
</section>

@endsection
