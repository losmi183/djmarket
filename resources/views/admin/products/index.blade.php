@extends('admin.layout')

@section('content')

    <div class="d-flex my-4">
        <h1 class="mx-2">Products</h1>
        <a href="{{route('products.create')}}" class="button-dark mx-2">Add New</a>
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
                <td> {{$product->presentPrice()}} </td>
                <td> {{$product->description}} </td>

                <td><img height="80px" src="{{ $product->image ? asset('storage/products/'.$product->image) : asset('img/no-image.jpg') }}" ></td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="text-primary" href="{{route('shop.show', $product->slug)}}" class="d-block"><i class="fa fa-eye" aria-hidden="true"></i>View</a>                              
                    <a class="text-success" href="{{route('products.edit', $product->id)}}" class="d-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button style="font-size:1rem !important" class="button-simple text-danger"><i class="fa fa-times" aria-hidden="true"></i>Del</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection