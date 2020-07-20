@extends('layouts.app')

@section('content')

    <div class="my-container">
        <h1>About this siteeee</h1>
        <ul class="list-group">
            <li class="list-group-item">Djmarket is shopping system for buying Dj equipement</li>
            <li class="list-group-item">Css Template is implemented with vanila css implemented via sass, without any css framework. 
            Optimized for mobile device with smaller screans</li>
            <li class="list-group-item">Product is categorised, and have selecting search and order mechanisams for easier finding products </li>
            <li class="list-group-item">Buyers can order any product in stock, and pay with their credit card.
            Currently have implemented stripe paying system, and soon we add paypal.</li>
            <li class="list-group-item">Application have main shopping cart and also Save for Later Cart for easier 
            Also have implemented discounts system with coupons for percentage and fixed discount</li>
            <li class="list-group-item">Administration</li>
            <li class="list-group-item">Administration is implemented with voyager package.
                Product imagec are resized automaticly to 1280px width
                Menues can change from backend system
            In Admin Area everybody with admin account can administrate product, categories, menues, coupons etc...</li>
        </ul>

    </div class="my-container">   


@endsection