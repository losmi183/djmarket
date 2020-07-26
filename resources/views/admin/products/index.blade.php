@extends('admin.layout')

@section('content')

    <div class="d-flex my-4">
        <h1 class="mx-2">Products</h1>
        <a href="#" class="button-dark mx-2">Add New</a>
        {{$products->appends(request()->input())->links()}}
    </div>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Details</th>
            <th>Price</th>
            <th>Description</th>

            <th>Image</th>
            <th>Images</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{$product->id}} </td>
                <td> {{$product->name}} </td>
                <td> {{$product->slug}} </td>
                <td> {{$product->details}} </td>
                <td> {{$product->price}} </td>
                <td> {{$product->description}} </td>

                <td><img height="80px" src="{{asset('img/products/'.$product->slug.'.jpg')}}" ></td>
                <td>  
                    <img height="25px" src="{{asset('img/products/'.$product->slug.'.jpg')}}" >
                    <img height="25px" src="{{asset('img/products/'.$product->slug.'.jpg')}}" >
                    <img height="25px" src="{{asset('img/products/'.$product->slug.'.jpg')}}" >
                </td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="text-primary" href="" class="d-block"><i class="fa fa-eye" aria-hidden="true"></i> View</a>                              
                    <a class="text-success" href="" class="d-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    <a class="text-danger" href="" class="d-block"><i class="fa fa-times" aria-hidden="true"></i></i> Del</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection