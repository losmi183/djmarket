@extends('layouts.app')

@section('title', 'Shop')
    
@section('content')

    <div class="liner"></div>

    <div class="my-container">
        <section id="main-area">
            <div class="categories">
                <h3>By Category</h3>
                <ul>
                    @foreach ($categories as $category)                        
                        <li><a class=" {{setActiveClass($category->slug) }}" href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="products">

                <div class="products-title">
                    <h1 class="title-lined"> {{$categoryName}} </h1>

                    <div class="sortname">
                        <span class="price">Sort By name: </span>
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sortname' => 'a-z'])}} "><span><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span></a>|
                        <a href="{{route('shop.index', ['category' => request()->category, 'sortname' => 'z-a'])}}"><span><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></span></a>
                    </div>

                    <div class="sort">
                        <span class="price">Sort by price:</span>
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}} "><span><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span></a>|
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}} "><span><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></span></a>
                    </div>
                </div>

                @if(count($products) > 0)            

                    <div class="products-content">
                        @foreach ($products as $product)
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
                
                @else
                    There's no product in {{$categoryName}}
                @endif

                <div class="pagination d-flex justify-content-center mt-5">
                    {{$products->appends(request()->input())->links()}}
                </div>

            </div>
        </section>
    </div>
    
@endsection