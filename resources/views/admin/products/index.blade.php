@extends('admin.layout')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>slug</th>
            <th>Name</th>
            <th>Price</th>
            <th>Img</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{$product->id}} </td>
                <td> {{$product->slug}} </td>
                <td> {{$product->name}} </td>
                <td> {{$product->price}} </td>
                <td> {{$product->image}} </td>
            </tr>
        @endforeach
    </table>
@endsection