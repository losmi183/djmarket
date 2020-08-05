@extends('admin.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h1>Add New Product</h1></div>

            <div class="card-body">

                <form action="{{route('products.store')}}" class="add-category-form" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Product Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                                                         
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Product Slug</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug')}}">
                                                 
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>    

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Details</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{old('slug')}}">
                                                 
                            @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>  

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Price(in dolars)</label>
                        <div class="col-md-6">
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('slug')}}">                       
                                
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>        
                    </div>  

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('slug')}}">
                                                 
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Categories</label>
                        <div class="col-md-6">
                            @foreach ($categories as $category)
                                <input type="checkbox" name="category[]" value="{{$category->id}}">
                                <label for="vehicle1">{{$category->name}}</label><br>
                            @endforeach
                              
                        </div>        
                    </div>



                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Main Image</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                 
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>  

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Multiple Images</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
                                                 
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>  


                    
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button class="button">Add</button>
                            <a href="{{route('products.index')}}" class="button-dark">Back</a>
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
</div>

<br>
    
@endsection