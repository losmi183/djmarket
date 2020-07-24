@extends('layouts.thankyou')

@section('content')

    <div class="my-container" id="about">
        <h1>About this Site</h1>
        
        <div class="about">
            <div class="box">
                <i class="fa fa-superpowers" aria-hidden="true"></i>
                <h3>Simple but Powerfull</h3>
                <p>Djmarket is shopping system for selling Dj equipement.</p>
            </div>
    
            <div class="box">
                <i class="fa fa-mobile" aria-hidden="true"></i>
                <h3>Mobile first design</h3>
                <p>Css Template is implemented with vanila css implemented via sass, without any css framework. Optimized for mobile device with smaller screans.</p>
            </div>
    
            <div class="box">
                <i class="fa fa-gift" aria-hidden="true"></i>
                <h3>Easy navigation</h3>
                <p>Product is categorised, and have sorting and search functions for easier finding products.</p>
            </div>
    
            <div class="box">
                <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                <h3>Simple Paying system</h3>
                <p>Buyers can order any product in stock, and pay with credit card.
            Currently have implemented stripe paying system.</p>
            </div>
    
            <div class="box">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <h3>Double Shopping Cart</h3>
                <p>Application have main shopping cart and also Save for Later cart for better shopping experience. Also have implemented discounts system with coupons for percentage and fixed discount.</p>
            </div>
        </div>



    </div>   


@endsection