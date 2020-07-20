<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightLike = Product::inRandomOrder()->take(4)->get();

        return view('cart', compact('mightLike'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'id' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        // Check if Product already in Cart
        $duplicate = Cart::search(function ($cartItem, $rowId) {
            return $cartItem->id === request()->id;
        });
        
        if($duplicate->isNotEmpty()) {
            return back()->with('error', 'Product Already in your Cart');
        }


        // Adding Product to Cart
        Cart::add(request()->id, request()->name, 1, request()->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Product Added to Cart');

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
        //
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
        Cart::update($id, $request->input('qty'));

        session()->flash('success', 'Quantity has been updated successfully');

        return response()->json(['success' => true]);

        // return back()->with('success', 'Quantity updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Item Removed from Cart');
    }

    // Custom Methods

    /**
     * Switch Item To Cart for Save For Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id) {        
        
        // Check if item already in save for later cart
        $duplicate = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        // If find same item in saveforlater return error
        if($duplicate->isNotEmpty()) {
            return back()->with('error', 'You already saved for later this Item');
        }


              
        
        // Find item with that $rowId
        $item = Cart::instance('default')->get($id);


        // Remove item from default card
        Cart::remove($id);


        // Adding Product to Other Cart
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        // Return back to Cart With message
        return back()->with('success', 'Item moved to save for later');

    }

}
