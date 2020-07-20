@extends('layouts.app')

@section('title', 'Checkout')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')


    <div class="my-container">
        <h1 class="title-lined">Checkout</h1>

        <section id="checkout">
            <div class="checkout-left">
                <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                    @csrf
                    <h3>Billing Details</h3>

                    <billing-details>
                        <div class="my-form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" id="email" value="{{old('email')}}"" required>
                        </div>

                        <div class="my-form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" required>
                        </div>

                        <div class="my-form-group">
                            <label>Address</label>
                            <input type="text" name="address" id="address" value="{{old('address')}}" required>
                        </div>

                        <div class="form-group-double">
                            <div class="my-form-group">
                                <label>City</label>
                                <input type="text" name="city" id="city" value="{{old('city')}}" required>
                            </div>
                            <div class="my-form-group">
                                <label>Province</label>
                                <input type="text" name="province" id="province" value="{{old('province')}}" required>
                            </div>
                        </div>
                        <div class="form-group-double">
                            <div class="my-form-group">
                                <label>Postal Code</label>
                                <input type="text" name="postalcode" id="postalcode" value="{{old('postalcode')}}" required>
                            </div>
                            <div class="my-form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" value="{{old('phone')}}" required>
                            </div>
                        </div>
                    </billing-details>

                    <div class="spacer"></div>
                    <h3>Payment Details</h3>
                    <div class="spacer"></div>

                    {{-- HTML from Stripe element API  --}}
                    <div class="card-form-group">
                        <label for="card-element">
                        Credit or debit card
                        </label>
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <div class="spacer"></div>

                    <button id="complete-order" class="button-complete">Complete Order</button>        

                </form>

            </div>


            <div class="checkout-right">
                <h3 class="checkout-order-title">Your Order</h3>

                <div class="order-table">

                    @foreach (Cart::content() as $item)
                        <div class="order-row">
                            <div class="order-row-left">
                                <div class="image-container">
                                    <img src="{{asset('img/products/'.$item->model->slug.'.jpg')}}" height="80px">
                                </div>
                                <div class="order-row-info">
                                    <p>{{$item->name}}</p>
                                    <p>{{$item->model->details}}</p>
                                    <p>{{$item->model->presentPrice()}}</p>
                                </div>
                            </div>
                            <div class="order-row-right">
                                <div class="checkout-table-quantity"> {{$item->qty}} </div>
                            </div>
                        </div>
                    @endforeach

                </div>{{-- order-table  --}}

                <div class="total-subtotal">
                    <div class="total-subtotal-left">
                        Subtotal <br>

                        @if(session()->get('discount'))
                            Discount ({{session()->get('coupon')['code']}})  
                            <form action="{{route('coupon.remove')}}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-simple ml-3">remove</button>
                            </form> <hr>
                            New Subtotal
                            <br>
                        @endif
                            
                                                                        
                        Tax <br>
                        <span class="total-price">Total</span>     
                    </div>
                    <div class="total-subtotal-right">
                        {{presentPrice(Cart::subtotal()) }} <br>

                        @if(session()->get('discount'))
                            -{{ presentPrice($discount) }} <hr>
                            {{ presentPrice($newSubtotal) }}
                            <br>
                        @endif

                        {{presentPrice(Cart::tax($newTax))}} <br>
                        <span class="total-price">{{presentPrice($newTotal) }}</span>
                    </div>
                </div>

                @if(! session()->get('discount'))
                    <p href="#" class="have-code">Have a Code?</p>

                    <div class="have-code-container bg-info">
                        <form action=" {{route('coupon.apply')}} " method="POST">
                            @csrf
                            <input type="text" name="code">
                            <button type="submit" class="button button-plain">Apply</button>
                        </form>
                    </div> <!-- end have-code-container -->
                @endif




            </div> {{-- checkout-right  --}}



        </section>
    </div>    


</body>
</html>
    
@endsection

@section('extra-js')
    <script>
        (function(){
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51H1CGdKIgCWsU8RI2FII8BD43dgdNBi5k4R0bKOUELXAe74uh5Pu3OfOYuvemw4p6q2agNwEmYlJp77vnmEchzKA00LVm6i4VB');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Nunuto", "Roboto", "Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();


            // Custom: disabled submit button after first click
            document.getElementById('complete-order').disabled = true;
            document.getElementById('complete-order').classList.add("disabled-button");


            // Custom option recomended by Stripe
            var options = {
                name: document.getElementById('name').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value,
            }
            // var options added in stripe.createToken(options)

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                //Custom: if error happend, enable button again
                document.getElementById('complete-order').disabled = false;
                document.getElementById('complete-order').classList.remove("disabled-button");

                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
            });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
            }
        })()
    </script>
@endsection