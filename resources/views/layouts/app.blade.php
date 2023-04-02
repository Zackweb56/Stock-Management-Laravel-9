<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stock Management</title>

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	{{-- thumbnail --}}
    <link rel="shortcut icon" href="{{ url('assets/img/icons/icon-48x48.png') }}" />
    {{-- css file --}}
    <link href="{{ url('assets/css/home.css') }}" type="text/css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        {{-- HEAD --}}
        <div class='Head'>
            <div class='container d-flex justify-content-between align-items-center'>
                <div class='Head-links1'>
                        <a href='#'><span class='Head-icon'><i class="fa-solid fa-phone text-white"></i>&nbsp;</span> +212674-362291</a>
                        <a href='#'><span class='Head-icon'><i class="fa-solid fa-envelope  text-white"></i>&nbsp;</span> zakaria@gmail.com</a>
                        <a href='#'><span class='Head-icon'><i class="fa-solid fa-location-arrow  text-white"></i>&nbsp;</span>  ISTA NTIC, beni mellal, Morocco</a>
                    </div>
                    <div class='Head-links2'>
                        <a href='#'><span class='Head-icon'><i class="fa-solid fa-dollar-sign text-white"></i>&nbsp;</span> USD</a>
                        <a href='#'><span class='Head-icon'><i class="fa-solid fa-user text-white"></i>&nbsp;</span> My Account</a>
                </div>
            </div>
        </div>
        {{-- HEADER --}}
        <div class='Header'>
            <div class='container'>
                <div class="row w-100 d-flex justify-content-between align-items-center">
                    <div class='Header-logo col-lg-4'>
                        <img src="{{ url('assets/img/icons/logo.png') }}" />
                    </div>
                    <div class='Header-searchBar col-lg-4'>
                        <form class='form d-flex'>
                          <input type='search' class='form-control search' placeholder='Search Here'/>
                          <input type='submit' class='btn' value='Search'/>
                        </form>
                    </div>
                    <div class='Header-heart-cart-icon d-flex justify-content-center col-lg-4'>
                        <div class='heart px-4 btn text-white'>
                            <div class='icon'>
                              <i class="fa-solid fa-shopping-cart"></i>&nbsp;<span>0</span>
                            </div>
                            <p>Shopping Cart</p>
                        </div>
                        <a href='{{ route('wishlists.index') }}' class='cart px-4 btn text-white'>
                            <div class='icon'>
                              <i class="fa-solid fa-heart "></i>&nbsp; <span>{{ $wishlistCount }}</span>
                            </div>
                            <p>Wishlist</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-md navbar_1">
            <div class="container text-white">
                <nav class="navbar navbar-expand-lg navbar_2">
                    <div class="">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="mt-2 {{  request()->is('/') ? 'text-primary':'' }}" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="mt-2 {{ request()->is('about') ? 'text-primary':'' }}" href="{{ route('pages.about') }}">About</a>
                            </li>
                            <li>
                                <a class="mt-2 " href="#">Store </a>
                            </li>
                            <li>
                                @if (Auth::check())
                                    @if (Auth::user()->utype == '1')
                                        <a class="mt-2" href="{{ route('admin.analytics') }}">Dashboard</a>
                                    @endif
                                @endif
                            </li>
                        </ul>
                      </div>
                    </div>
                </nav>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto ">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="auth_btn auth_btn1" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="auth_btn auth_btn2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="text-dark"><i class="fa-solid fa-user text-primary"></i>&nbsp; {{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end text-white" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="pages-profile.html"><i class="fa-solid fa-user text-secondary"></i>&nbsp; Profile</a>
                                        <a class="dropdown-item" href="index.html"><i class="fa-sharp fa-solid fa-gears text-secondary"></i>&nbsp; Settings & Privacy</a>
                                        <div class="dropdown-divider"></div>
                                        <div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-right-from-bracket text-secondary"></i>&nbsp;
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                </div>
            </div>
        </nav>
{{--
        <main>
            @yield('slider')
        </main> --}}

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <footer>
        <div class='bgc-darker footer'>
            <div class='container text-light py-5'>
                <div class='row'>
                    <div class='about col-lg-3 col-md-6 col-sm-12 mb-3'>
                        <h3 class='fw-bold footer_title1'>About Us</h3>
                        <p class='aboutus'>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
                        </p>
                        <div class='footerlinks'>
                            <a href='#'>
                                <span class='Head-icon'><i class="fa-solid fa-location-arrow text-white"></i>&nbsp;</span>&nbsp;
                                ISTA NTIC, beni mellal, Morocco
                            </a><br>
                            <a href='#'>
                                <span class='Head-icon'><i class="fa-solid fa-phone text-white"></i>&nbsp;</span>&nbsp;
                                +212674-362291
                            </a><br>
                            <a href='#'>
                                <span class='Head-icon'><i class="fa-solid fa-envelope text-white"></i>&nbsp;</span>&nbsp;
                                zakaria@gmail.com
                            </a><br>
                        </div>
                    </div>
                    <div class='categories col-lg-3 col-md-6 col-sm-12 mb-3'>
                        <h3 class='fw-bold footer_title'>Categories</h3>
                        <div class='footerlinks linehight'>
                            <a href='#'>Hot Deal</a><br>
                            <a href='#'>Laptops</a><br>
                            <a href='#'>SmartPhones</a><br>
                            <a href='#'>Cameras</a><br>
                            <a href='#'>Accessoires</a><br>
                        </div>
                    </div>
                    <div class='information col-lg-3 col-md-6 col-sm-12 mb-3'>
                        <h3 class='fw-bold footer_title'>Information</h3>
                        <div class='footerlinks linehight'>
                            <a href='#'>About Us</a><br>
                            <a href='#'>Contact Us</a><br>
                            <a href='#'>Privacy Policy</a><br>
                            <a href='#'>Orders and Returns</a><br>
                            <a href='#'>Terms & Conditions</a><br>
                        </div>
                    </div>
                    <div class='services col-lg-3 col-md-6 col-sm-12 mb-3'>
                        <h3 class='fw-bold footer_title'>Service</h3>
                        <div class='footerlinks linehight'>
                            <a href='#'>My Account</a><br>
                            <a href='#'>View Cart</a><br>
                            <a href='#'>Wishlist</a><br>
                            <a href='#'>Track My Order</a><br>
                            <a href='#'>Helps</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='bgc-dark text-center'>
            <div class='payement-icons fs-1 py-3'>
                <i class="fas fa-credit-card text-secondary"></i>&nbsp;
                <i class="fa-brands fa-cc-visa text-secondary"></i>&nbsp;
                <i class="fa-brands fa-paypal text-secondary"></i>&nbsp;
                <i class="fa-brands fa-cc-discover text-secondary"></i>&nbsp;
                <i class="fa-brands fa-cc-master-card text-secondary"></i>&nbsp;
                <i class="fa-brands fa-cc-amex text-secondary"></i>&nbsp;
            </div>
            <hr class="text-white">
            <div class='copyrights aboutus pb-4'>
                <span class="text-white">
                    Copyright © 2022 All rights reserved | Created by &nbsp;
                    <span class='text-primary'>Zakaria Boughaba</span>
                </span>
            </div>
        </div>
    </footer>


</body>
</html>

