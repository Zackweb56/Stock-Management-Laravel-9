@extends('layouts.app')

@section('content')
<div class="container my-4 h-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5 col-lg-6 d-none d-md-block w-50">
                        <img src={{ url("/images/$products->image") }} class="img-fluid w-100 my-4" alt="">
                    </div>
                    <div class="col-md-7 col-lg-6 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <h2 class="fw-bold text-secondary">About this Product</h2>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <p>Category : <span class="text-secondary">{{ $products->category->category_name }}</span></p>
                                <p>Brand : <span class="text-secondary">{{ $products->brand->brand_name }}</span></p>
                            </div>
                            <h3>{{ $products->product_name }}</h3>
                            <p class="linehight">{{ $products->description }}</p>
                            <div class="d-flex align-items-center">
                                <button class="btn border text-primary" id="decrement">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="text" readonly value="1" id="quantityInp" class="form-control text-center" style="width:45px;">
                                <button class="btn border text-primary" id="increment">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <p>
                                <span class="text-primary fs-2">{{ $products->new_price }} Dh</span>&nbsp;
                                <span class="text-secondary fs-5 text-decoration-line-through">{{ $products->old_price }} Dh</span>
                            </p>
                            <form class="buttons w-100" action="{{ route('wishlists.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <button type="submit" class="btn border-primary btn-sm "><i class="fa-solid fa-heart text-primary"></i>&nbsp; Add to Wishlist</button>
                                <button type="submit" class="btn border-primary btn-sm "><i class="fa-solid fa-shopping-cart text-primary"></i>&nbsp; Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const incrementButton = document.getElementById('increment');
    const decrementButton = document.getElementById('decrement');
    const quantityInp = document.getElementById('quantityInp');

    incrementButton.addEventListener('click', ()=>{
        quantityInp.value = parseInt(quantityInp.value) + 1;
    });

    decrementButton.addEventListener('click', ()=>{
        if (parseInt(quantityInp.value) > 1) {
            quantityInp.value = parseInt(quantityInp.value) - 1;
        }
    });
</script>
@endsection
