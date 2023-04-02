@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-7 col-lg-6 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="{{ asset('assets/img/icons/icon-48x48.png') }}" style="margin-right: 15px;" width="40px" height="40px" alt="">
                                <span class="h1 fw-bold mb-0">Register</span>
                            </div>
                            <p class="text-secondary">Sign up to our Dashboard</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">      
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Enter Your Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">     
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Enter a Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" placeholder="Confirm Your Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p class="text-secondary">
                                            Do You have an account?
                                            <a href="{{ route('login') }}" class="btn text-primary">Login Here</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-6 d-none d-md-block w-50 bg-primary">
                        <img src="{{ asset('assets/img/photos/register.png') }}" class="img-fluid w-100 mt-5" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
