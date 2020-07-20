@extends('layouts.thankyou')

@section('content')

    <div class="my-container">
        <div class="thankyou">
            <h1>Thank you for your Order!</h1>
            <p>A confirmation email was sent</p>
            <a href=" {{route('landing-page')}} " class="button-light">Home Page</a>
        </div>
    </div>
    
@endsection