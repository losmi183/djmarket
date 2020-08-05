@extends('admin.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h1>Edit Category</h1></div>

            <div class="card-body">

                <form action="{{route('categories.update', $category->id)}}" class="add-category-form" method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $category->name}}">
                             
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Category Slug</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug') ?? $category->slug}}">

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
        
                    </div>    
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="button">Update</button>
                                <a href="{{route('categories.index')}}" class="button-dark">Back</a>
                            </div>
                        </div>

                </form>
                
            </div>
        </div>
    </div>
</div>

<br>
    
@endsection