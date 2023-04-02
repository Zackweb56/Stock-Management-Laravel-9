@extends('layouts.app')

@section('slider')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
                    <img class="d-block w-100" src={{ url("/images/$slider->image") }} alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="slider_title fs-1 fw-bold text-white">{{ $slider->title }}</h5>
                        <p class="slider_description fs-4 text-light">{{ $slider->description }}</p>
                    </div>
                </div>
            @endforeach
            <button type="button" class="slide_btn btn border-white text-light">View More</button>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{ $message }}
            </div>
        @elseif($message = Session::get('failed'))
            <div class="alert alert-warning">
                <strong>Failed :</strong> {{ $message }}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-8">
                <h1 class="text-secondary">All Products</h1>
            </div>
            <div class="col-4">
                <select class="form-select" name="category_id" id="category_id">
                    <option selected>Choose a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            <a href="{{ route('home.filter',['category' => $category->category_name ] ) }}">
                                {{ $category->category_name }}
                            </a>
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex flex-wrap w-100 justify-content-start">
            @forelse ($products as $product)
                <div class="col-3 my-2 ">
                    <div class="card rounded-2 product_card" style="width: 17rem;hight: 420px;">

                        @if ($product->status)
                            <span class="status bg-danger mt-4 rounded-5">{{ $product->status }}</span>
                        @endif

                        <div class="card_img w-100">
                            <img src={{ url("/images/$product->image") }} class="card-img-top img-fluid w-100" alt="img_product">
                        </div>
                        <div class="card-body">
                            <p class="text-center">
                                <span class="text-secondary">
                                {{ $product->category->category_name }} ({{ $product->brand->brand_name }})
                                </span>
                            </p>
                            <h3 class="fs-4 fw-bold product_title">{{ $product->product_name }}</h3>
                            <p class="linehight">{{ $product->description }}</p>
                            <p>
                                <span class="text-primary fs-2">{{ $product->new_price }} Dh</span>&nbsp;
                                <span class="text-secondary fs-5 text-decoration-line-through">{{ $product->old_price }} Dh</span>
                            </p>
                            <div>
                                <a href="{{ route('user.show', $product->id) }}" class="btn btn-primary text-white">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <span class="text-danger fs-2 bg-danger text-white p-2">No Product Available !</span>
            @endforelse
        </div>

@endsection
