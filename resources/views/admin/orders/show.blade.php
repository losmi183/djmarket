@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-header row">
            <div class="col-sm-4">
                <h1>Order ID: {{$order->id}} Details</h1>
            </div>
            <div class="col-sm-4">
                <form action="{{route('orders.update', $order->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h3 class="text-right mt-2">Order Status</h3>
                        </div>

                        <select name="newStatus" class="form-control col-sm-4">
                            <option {{ $order->order_status == 'processing' ? 'selected' : '' }} value="processing">Processing</option>
                            <option {{ $order->order_status == 'sent' ? 'selected' : '' }} value="sent">Sent</option>
                            <option {{ $order->order_status == 'delivered' ? 'selected' : '' }} value="delivered">Delivered</option>
                        </select>
                        <button type="submit" class="button-simple text-danger col-sm-4">Change Status</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 pt-2 text-right">
                <a href="{{route('orders.index')}}" class="button-dark">Back</a>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body admin-show">

                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Order ID</div>
                            <p class="col-md-6">{{$order->id}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Customer ID</div>
                            <p class="col-md-6">{{$order->user_id}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Billing Email</div>
                            <p class="col-md-6">{{$order->billing_email}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing Name</div>
                            <p class="col-md-6">{{$order->billing_name}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right"> Billing address</div>
                            <p class="col-md-6">{{$order->billing_address}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing city</div>
                            <p class="col-md-6">{{$order->billing_city}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Billing Province</div>
                            <p class="col-md-6">{{$order->billing_province}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing Postalcode</div>
                            <p class="col-md-6">{{$order->billing_postalcode}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Billing Phone</div>
                            <p class="col-md-6">{{$order->billing_phone}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing Discount</div>
                            <p class="col-md-6">{{ $order->billing_discount ? presentPrice($order->billing_discount) : '---'}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Billing Discount Code</div>
                            <p class="col-md-6">{{$order->billing_discount_code ?? '---'}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing Subtotal</div>
                            <p class="col-md-6">{{presentPrice($order->billing_subtotal)}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Billing Tax</div>
                            <p class="col-md-6">{{presentPrice($order->billing_tax)}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right"> Billing Total</div>
                            <p class="col-md-6">{{presentPrice($order->billing_total)}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Payment Getway</div>
                            <p class="col-md-6">{{$order->payment_getway}}</p>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-4 col-form-div text-md-right">Shipped</div>
                            <p class="col-md-6">{{$order->shipped}}</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-form-div text-md-right">Error</div>
                            <p class="col-md-6">{{$order->error ?? '---' }}</p>
                        </div>          
                        
                    </div>
                </div>
            </div>
        </div>

    </div>    {{-- col-md-6 --}}


    <div class="col-md-6">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body admin-show">            
                        <h3>Products in Order</h3>     
                        
                        <table class="table">
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Single Product Price</th>
                                <th>Quantity</th>
                                <th>Sum Price</th>
                                <th></th>
                            </tr>
                            @foreach ($order->products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{presentPrice($product->price)}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td>{{presentPrice($product->price * $product->pivot->quantity)}}</td>
                                <td>
                                    <a class="button-simple text-success" href="{{route('shop.show', $product->slug)}}">view product</a>
                                </td>
                            </tr>                                
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>    {{-- col-md-6 --}}



</div>   {{-- Row --}}


   
@endsection