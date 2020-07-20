<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success', 'Item Removed');
    }


    public function backToCart($id) {

        // Check if item already in CART(default)
        $duplicate = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        // If find same item in CART already exists, return error
        if($duplicate->isNotEmpty()) {
            return back()->with('error', 'You already have this Item in Shopping Cart');
        }



        

        // Find item with that $rowId
        $item = Cart::instance('saveForLater')->get($id);

        // Delete from saveForLater
        Cart::instance('saveForLater')->remove($id);

        // Add to default CART
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');



        // Return back to Cart With message
        return back()->with('success', 'Item moved to Shopping Cart');

    }

}
