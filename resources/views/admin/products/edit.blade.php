@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-4 w-75">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary">Edit Products Page</h2>
                    <a href="{{ route('products.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body w-100">
                    <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-12">
                            <label class="fs-4" for="product_name">Product Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $products->product_name }}" class="form-control" name="product_name" id="product_name" placeholder="enter category name">
                            @error('product_name')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="category_id">Product Category <span class="text-danger">*</span></label>
                            <select class="form-select" name="category_id" id="category_id">
                                <option selected>Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="brand_id">Product Brands <span class="text-danger">*</span></label>
                            <select class="form-select" name="brand_id" id="brand_id">
                                <option selected>Choose a brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label class="fs-4" for="description">Product Description <span class="text-danger">*</span></label>
                            <textarea name="description"id="description" class="form-control" cols="15" rows="3">
                                {{ $products->description }}
                            </textarea>
                            @error('description')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="new_price">Selling Price <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $products->new_price }}" class="form-control" name="new_price" id="new_price" placeholder="enter category name">
                            @error('new_price')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="old_price">Old Price <span class="text-secondary">(optional)</span></label>
                            <input type="text" value="{{ $products->old_price }}"  class="form-control" name="old_price" id="old_price" placeholder="enter old price of product">
                            @error('old_price')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="quantity">Product Quantity <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $products->quantity }}" class="form-control" name="quantity" id="quantity" placeholder="enter category name">
                            @error('quantity')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="status">Status <span class="text-secondary">(optional)</span></label>
                            <input type="text" value="{{ $products->status }}" class="form-control" name="status" id="status" placeholder="enter status of product">
                            @error('status')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-12">
                            <label class="fs-4" for="image">Product image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @error('image')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-12">
                            <img src="/images/{{ $products->image }}" width="58px" height="58px" alt="img">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100"><i class="fa-solid fa-refresh"></i>&nbsp; Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
