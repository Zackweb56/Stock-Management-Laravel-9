@extends('admin.dashboard')

@section('dashboard')
    <div class="container m-4">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            Your analytics dashboard Template &nbsp;&nbsp;
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Analytics</span>
            </span>
        </p>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body nav-item bg-info border border-white rounded-3 text-white mb-2 p-3">
                    <label class="fs-3 fw-bold">Total Users</label>
                    <h1 class="text-white">{{ $totalUsers }}</h1>
                    <a href="#" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body nav-item bg-primary border border-white rounded-3 text-white mb-2 p-3">
                    <label class="fs-3 fw-bold">Total Admins</label>
                    <h1 class="text-white">{{ $totalAdmins }}</h1>
                    <a href="#" class="text-white">View</a>
                </div>
            </div>
            <hr class="mt-1">
            <div class="col-md-3">
                <div class="card card-body nav-item bg-success border border-white rounded-3 text-white mb-2 p-3">
                    <label class="fs-3 fw-bold">Total Categories</label>
                    <h1 class="text-white">{{ $totalCategories }}</h1>
                    <a href="{{ route('categories.index') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body nav-item bg-warning border border-white rounded-3 text-white mb-2 p-3">
                    <label class="fs-3 fw-bold">Total Brands</label>
                    <h1 class="text-white">{{ $totalBrands }}</h1>
                    <a href="{{ route('brands.index') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body nav-item bg-danger border border-white rounded-3 text-white mb-2 p-3">
                    <label class="fs-3 fw-bold">Total Products</label>
                    <h1 class="text-white">{{ $totalProducts }}</h1>
                    <a href="{{ route('products.index') }}" class="text-white">View</a>
                </div>
            </div>
        </div>
    </div>
@endsection