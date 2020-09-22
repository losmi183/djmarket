@extends('layouts.login')

@section('content')
<div class="container login-form">

    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">You are welcome to login and check admin backend, email: admin@djmarket.co , pass: password </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="left-panel">

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <h2>Returning Customer</h2>
            
                   
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                    <div class="mb-3 input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>


                 

                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <button type="submit" class="button-dark">Login</button>

                                <p class="mt-2"><a class="small-text" href="{{ route('password.request') }}">Forgot Password?</a></p>
                            </div>    
                            
                            <div>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                    

                 

                </form>
            </div>  {{-- Panel-left  --}}
        </div>    {{-- col-md-8  --}}

        <div class="col-md-6">
            <div class="right-panel">
                <h2>New Customer</h2>
                <div class="">
                    <h4>Save time now</h4>
                    <p>You Dont need an account to checkout</p>
                    <div class="spacer"></div>
                    <a class="auth-button-hollow" href=" {{route('guestCheckout.index')}} ">Continue as Guest</a>
                </div>
                <div class="">
                    <h4>Save time later</h4>
                    <p>Create an account for fast checkout and easy access to order history</p>
                    <div class="spacer"></div>
                    <a href=" {{route('register')}} " class="auth-button-hollow">Create an Account</a>
                </div>
            </div>
        </div>

    </div>    {{-- row  --}}

</div> {{-- container --}}
@endsection