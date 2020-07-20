<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();


        // Taking query String if exists
        if(request()->category) {
            // whereHas select only products with category.slug / Where by relation side...
            // Odabrani su svi proizvodi koji imaju bar 1 kategoriju / Dalje prosledjujemo categories u novu funkciju
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            });
              
            // Invers relation, Category with products, Eager Load
            // return $products_with_category = Category::with('products')->where('slug', request()->category)->get();
            $categoryName = optional(Category::where('slug', request()->category)->first())->name;
        }
        else {
            $products = Product::where('featured', true);

            $categoryName = 'Featured';
        }


        // Sort by price
        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        }
        elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }
        // Sort By Name
        elseif (request()->sortname == 'a-z') {
            $products = $products->orderBy('name')->paginate($pagination);
        }
        elseif(request()->sortname == 'z-a') {
            $products = $products->orderBy('name', 'desc')->paginate($pagination);
        }  
        else {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }  


        return view('shop', [
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName
        ]);
    }

 
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        
        $mightLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();

        return view('product', compact('product', 'mightLike'));
    }

}
