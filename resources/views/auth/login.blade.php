@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5 col-lg-6 d-none d-md-block w-50 bg-primary">
                        <img src="{{ asset('assets/img/photos/Login02.png') }}" class="img-fluid w-100 mt-4" alt="">
                    </div>
                    <div class="col-md-7 col-lg-6 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="{{ asset('assets/img/icons/icon-48x48.png') }}" style="margin-right: 15px;" width="40px" height="40px" alt="">
                                <span class="h1 fw-bold mb-0">Login</span>
                            </div>
                            <p class="text-secondary">Login to our Dashboard</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label text-secondary" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="text-primary mt-3" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p class="text-secondary">
                                            Don't have an account?
                                            <a href="{{ route('register') }}" class="btn text-primary">Register Here</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
