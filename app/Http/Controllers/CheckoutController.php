<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       

        return view('checkout', [
            // Accessioing collection with array and method get() 
            'discount' => $this->getNumbers()['discount'],
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal'),
        ]);
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
    public function store(CheckoutRequest $request)
    {
        // Create json with product slug => qty
        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount' => $this->getNumbers()->get('newTotal') / 100,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' =>[
                    // Charge to Order ID after we start using DB
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('discount'))->toJson()
                ],
            ]);

            // Calling addOrdersToTables method to fill order and orderproduct tables
            $this->addOrdersToTables($request, null);

            // Coupon Destroy
            session()->forget('discount');

            // SUCCESSFUL
            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success', 'Thank you, your payment has been successfully acepted!');
        } catch (CardErrorException $e) {

            // Call addOrdersToTables when error happend
            $this->addOrdersToTables($request, $e->getMessage());

            return back()->with('error', $e->getMessage());
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Custom Helper Methods

    // Calculating new Values for Subtotal Tax and Total based on Coupon discount
    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('discount')['discount'] ?? 0;
        $newSubtotal = Cart::subtotal() - $discount;
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        // Returning collection for reuse multiple times
        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);

    }
    
    public function addOrdersToTables($request, $error) {

        // Create row to ORDER table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'payment_getway' => 'stripe',
            'shipped' => false,
            'error' => $error
        ]);

        // Create Row in ProductOrder
        foreach (Cart::instance('default')->content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' =>  $item->qty
            ]);
        }
    }   

}
