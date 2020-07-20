<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponsController extends Controller
{    
    /**
     * Apply Coupon to discount
     *
     * @param  string  Request $request
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {
        // First Check if coupon send
        $request->validate([
            'code' => 'required'
        ]);

        // Find coupon by code / with custom method from model
        $coupon = Coupon::findByCode($request->code);

        if(! $coupon) {
            return back()->with('error', 'Invalid Coupon Code');
        }        

        session()->put('discount', [
            'code' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal())
        ]);        
        
        return back()->with('success', 'Coupon Successfully Applied');
    }


    /**
     * Remove Coupon
     *
     * @param  void
     * @return \Illuminate\Http\Response
     */
    public function remove() 
    {
        session()->forget('discount');

        return back()->with('success', 'Coupon Removed');
    }

}
