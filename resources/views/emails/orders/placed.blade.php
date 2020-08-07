<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        body {
            font-family:  Helvetica, Arial, sans-serif;
        }
      .mail-container {
          width: 600px;
          margin: 0 auto;
      }
      .important {
          border: 1px solid black;
          background: #eee;
          padding: 10px;
      }
    </style>
</head>
<body>

    <div class="mail-container">
        <h1>{{$order->billing_name}} thank you for choosing our company</h1>

        <h3>We have received your order and will deliver it to you as soon as possible</h3>
    
        <div class="important">
            Order id: {{$order->id}} <br>
            Order name: {{$order->billing_name}} <br>
            Order email: {{$order->billing_email}} <br>
            Order total: {{presentPrice($order->billing_total)}}
        </div>

        <h3>You have selected the following products</h3>

        <div class="important">
            @foreach ($order->products as $product)
                Product name: {{$product->name}} <br>
                Product price: {{presentPrice($product->price)}} <br>
                Product quantity: {{$product->pivot->quantity}} <br>
                <br>
            @endforeach
        </div>

        <h3>You Can always check all your orders at the <a href="djmarket.co">Customer Area</a></h3>
    
        <p>We will send you the order as soon as possible</p>
    
        <p>Your Djmarket team</p>
    </div>

</body>
</html>