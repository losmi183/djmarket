@extends('admin.layout')

@section('content')

    <div class="d-flex my-4">
        <h1 class="mx-2">Categories</h1>
        <a href="{{route('categories.create')}}" class="button-dark mx-2">Add New</a>
    </div>

    <br>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td> {{$category->id}} </td>
                <td> {{$category->name}} </td>
                <td> {{$category->slug}} </td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a class="text-success" href="{{route('categories.edit', $category->id)}}" class="d-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-link" class="d-block">
                            <i class="fa fa-times" aria-hidden="true"></i>Del
                        </button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </table>
@endsection