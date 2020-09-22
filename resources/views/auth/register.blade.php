@extends('layouts.login')

@section('content')
<div class="container register-form">

    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">You are welcome to login and check admin backend, email: admin@djmarket.co , pass: password </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="left-panel">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <h2>Register</h2>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <input placeholder="Name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="button">
                                Register
                            </button>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-right">Already have an account?
                                <a href=" {{route('login')}} " class="text-right">login</a>

                            </h4>
                        </div>
                    </div>
                </form>
            </div>  {{-- left-panel  --}}
 

        </div>{{-- col-md-6  --}}


        <div class="col-md-6">

            <div class="right-panel">
                <h2>Benefits</h2>
                <div class="">
                    <h4>Save time now</h4>
                    <p>You Dont need an account to checkout</p>
                    <div class="spacer"></div>
                    <a  href="{{route('guestCheckout.index')}}" class="auth-button-hollow">Continue as Guest</a>
                </div>
                <div class="">
                    <h4>Loyalty Program</h4>
                    <p>Creatin an account will allow you to checkout faster in the future, have easy access to order history and customize your experience to suit your preferences.</p>
                    <div class="spacer"></div>
                    <a href="{{route('register')}}" class="auth-button-hollow">Create an Account</a>   
                </div>
            </div>

        </div>

    </div>    {{-- Row  --}}
</div> {{-- Container  --}}
@endsection
