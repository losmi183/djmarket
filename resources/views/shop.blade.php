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
                        
                        <li><a class=" {{setActiveClass($category->slug) }}   " href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                        {{-- <li><a class="{{$category->slug }} i  {{request()->category }}" 
                                href=" {{route('shop.index', ['category' => $category->slug])}} ">{{$category->name}}
                            </a></li> --}}
                    @endforeach
                </ul>
            </div>
            <div class="products">

                <div class="products-title">
                    <h1 class="title-lined"> {{$categoryName}} </h1>

                    <div class="sortname">
                        <span class="price">Sort By name: </span>
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sortname' => 'a-z'])}} ">A-Z</a>|
                        <a href="{{route('shop.index', ['category' => request()->category, 'sortname' => 'z-a'])}}">Z-A</a>
                    </div>

                    <div class="sort">
                        <span class="price">Sort by price:</span>
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}} "><span>High to Low</span>|</a>
                        <a href=" {{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}} "><span>Low to High</span></a>
                    </div>
                </div>

                @if(count($products) > 0)            

                    <div class="products-content">
                        @foreach ($products as $product)
                            <div class="box">
                                <div class="box-image">
                                    <a href="{{route('shop.show', $product->slug)}}">
                                        <img width="250px" src="{{asset('img/products/'.$product->slug.'.jpg')}}">
                                    </a>
                                </div>
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