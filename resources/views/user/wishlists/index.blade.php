@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{ $message }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="">Wishlist Page</h2>&nbsp;
            <span class="bg-primary p-2 mt-2 text-white">You Have Added ({{ $TotalWishlist }}) Wishlists</span>
        </div>
        <hr>
        <div class="mt-4 text-center">
            <div class="row">
                <div class="col-lg-3">
                    <h3>Product Name</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Quantity</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Price</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Action</h3>
                </div>
            </div>
            @forelse ($wishlists as $wishlist)
                <div class="mb-2 p-3 border border-primary rounded-3">
                    <div class="row">
                        <div class="col-lg-3 d-flex align-items-center">
                            <img src={{ url("/images/". $wishlist->product->image) }} alt="img" width="40px">&nbsp;
                            <p>{{ $wishlist->product->product_name }}</p>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center">
                            <div class="d-flex align-items-center">
                                <button class="btn border text-primary">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="text" readonly value="1" class="form-control" style="width:35px;">
                                <button class="btn border text-primary">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="mt-1">${{ $wishlist->product->new_price }}</h3>
                        </div>
                        <div class="col-lg-3">
                            <form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('are you sure you want to delete this Wishlist?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp; Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <span class="text-danger fs-2 bg-danger text-white p-2">No Wishlists Available !</span>
            @endforelse
        </div>
    </div>
@endsection
