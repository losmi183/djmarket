@extends('layouts.app')

@section('title', 'Search Results')
    
@section('content')

    <div class="liner"></div>

    <div class="my-container">
        <section>

            <h1>Search Results</h1>
            <p class="my-3">{{$products->total()}} result(s) for '{{request()->search}}' </p>

            {{ $products->appends(request()->input())->links()}}

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></td>
                    <td>{{$product->details}}</td>
                    <td>{{shortText($product->description)}}</td>
                    <td>{{presentPrice($product->price)}}</td>
                </tr>
                @endforeach
                
            </table>


 
        </section>
    </div>

    {{-- @include('includes.might-like') --}}

</body>
</html>
    
@endsection
