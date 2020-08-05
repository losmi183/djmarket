<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating inputs
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,',
            'slug' => 'required|unique:categories,slug,',
            'details' => 'sometimes|max:255',
            'price' => 'required|numeric',
            'description' => 'sometimes|max:2500',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:99999',
        ]);        
        
        // Single Image Upload
        if($request->hasFile('image')) 
        {
            $file = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/products', $file);                      
        }
        else {
            $file = null;
        }

        // Multiple Image Upload
        if($request->hasFile('images'))
        {
            $i=1;
            $images_array = [];
            foreach($request->file('images') as $image)
            {
                $filename = $i++ .'_'. time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/products', $filename);
                array_push($images_array, $filename);
            }
            $images_json = json_encode($images_array);
        } else {
            $images_json = NULL;
        }


        // Then creating product
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' => $request->details,
            'price' => $request->price * 100,
            'description' => $request->description,
            'image' => $file,
            'images' => $images_json
        ]);

        
        // Creating Rows in category_product pivot table
        if($request->category) {
            foreach($request->category as $category) {
                CategoryProduct::create([
                    'category_id' => $category,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product successfully added');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        // Creating array from category->ids for this product
        $selectedCategories = $product->categories;
        $all_cats = [];
        foreach($selectedCategories as $cat) {
            array_push($all_cats, $cat->id);
        }

        return view('admin.products.edit', compact('product', 'categories', 'all_cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validating inputs
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,',
            'slug' => 'required|unique:categories,slug,',
            'details' => 'sometimes|max:255',
            'price' => 'required|numeric',
            'description' => 'sometimes|max:2500',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:99999',
        ]); 

        // Finding that product
        $product = Product::find($id);                
        
        // Single Image Upload
        if($request->hasFile('image')) 
        {   
            // First delete old image
            if($product->image) {
                Storage::delete('public/products/'.$product->image);
            }
            // Adding new image
            $file = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/products', $file);                      
        }
        else {
            $file = $product->image;
        }

        // Multiple Image Upload
        if($request->hasFile('images'))
        {
            // First delete ALL old images
            if($product->images) {
                $images = json_decode($product->images);
                    
                foreach($images as $img) {
                    Storage::delete('public/products/'.$img);
                }
            }

            // Then add new
            $i=1;
            $images_array = [];
            foreach($request->file('images') as $image)
            {
                $filename = $i++ .'_'. time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/products', $filename);
                array_push($images_array, $filename);
            }
            $images_json = json_encode($images_array);
        } else {
            $images_json = $product->images;
        }


        // Then update product
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' => $request->details,
            'price' => $request->price * 100,
            'description' => $request->description,
            'image' => $file,
            'images' => $images_json
        ]);
        
        // Creating Rows in category_product pivot table
        // First Delete all rows in pivot table
        $cats = CategoryProduct::where('product_id', $product->id)->get();
        foreach($cats as $cat) {
            $cat->delete();
        }

        // Then add new rows in pivot based on new selection
        foreach($request->category as $category) {
            CategoryProduct::create([
                'category_id' => $category,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        // First Delete image
        if($product->image) {
            Storage::delete('public/products/'.$product->image);
        }

        // Then delete all images
        if($product->images) {
            $images = json_decode($product->images);
                 
            foreach($images as $img) {
                 Storage::delete('public/products/'.$img);
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}
