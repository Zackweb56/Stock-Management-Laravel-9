<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	{{-- thumbnail --}}
    <link rel="shortcut icon" href="{{ url('assets/img/icons/icon-48x48.png') }}" />

	{{-- <link rel="canonical" href="https://demo-basic.adminkit.io/" /> --}}

    <title>LARAVEL PRODUCT STOCK MANAGEMENT</title>


    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ url('assets/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/dashboard.css') }}" type="text/css" rel="stylesheet">
	{{-- <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}" rel="stylesheet"> --}}
</head>
<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Dashboard</span>
                </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item {{ Request::is('admin/analytics') ? 'active':'' }}">
                    <a class="sidebar-link" href="{{ route('admin.analytics') }}">
                        <i class="fa-solid fa-dashboard"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/">
                        <i class="fa-solid fa-house"></i> <span class="align-middle">Home</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/categories') ? 'active':'' }}">
                    <a class="sidebar-link" href="{{ route('categories.index') }}">
                        <i class="fa-solid fa-list"></i><span class="align-middle">Categories</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/brands') ? 'active':'' }}">
                    <a class="sidebar-link" href="{{ route('brands.index') }}">
                        <i class="fa-solid fa-tags"></i> <span class="align-middle">Brands</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/products') ? 'active':'' }}">
                    <a class="sidebar-link" href="{{ route('products.index') }}">
                        <i class="fa-solid fa-box-archive"></i><span class="align-middle">Products</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/sliders') ? 'active':'' }}">
                    <a class="sidebar-link" href="{{ route('sliders.index') }}">
                        <i class="fa-solid fa-sliders"></i><span class="align-middle">Sliders</span>
                    </a>
                </li>
            </ul>


        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <h1 class="text-secondary mx-5">Welcome to dashbord <span class="username">{{ Auth::user()->name }}</span></h1>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                 <span class="text-dark"><i class="fa-solid fa-user text-secondary"></i>&nbsp; {{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><i class="fa-solid fa-user"></i>&nbsp; Profile</a>
                                <a class="dropdown-item" href="index.html"><i class="fa-sharp fa-solid fa-gears"></i>&nbsp; Settings & Privacy</a>

                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('dashboard')

            <footer class="footer bg-white">
                <p class="text-secondary text-center p-2">Copyrights &copy; 2022-2023 | by <span class="username">zakaria boughaba</span></p>
            </footer>

        </div>
    </div>


	<script src="{{ url('assets/js/app.js') }}" type="text/js" ></script>
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
