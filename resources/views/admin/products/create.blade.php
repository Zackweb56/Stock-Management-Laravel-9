@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-4 w-75">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{ $message }}
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary">Add Products Page</h2>
                    <a href="{{ route('products.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body w-100">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap">
                        @csrf
                        <div class="form-group col-12">
                            <label class="fs-4" for="product_name">Product Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('product_name') }}" class="form-control @error('product_name') border-danger @enderror" name="product_name" id="product_name" placeholder="enter category name">
                            @error('product_name')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="category_id">Product Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') border-danger @enderror" name="category_id" id="category_id">
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
                            <select class="form-select @error('brand_id') border-danger @enderror" name="brand_id" id="brand_id">
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
                            <textarea name="description"id="description" class="form-control @error('description') border-danger @enderror" cols="15" rows="3">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="new_price">Selling Price <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('new_price') }}" class="form-control @error('new_price') border-danger @enderror" name="new_price" id="new_price" placeholder="enter category name">
                            @error('new_price')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="old_price">Old Price <span class="text-secondary">(optional)</span></label>
                            <input type="text" value="{{ old('old_price') }}" class="form-control @error('old_price') border-danger @enderror" name="old_price" id="old_price" placeholder="enter old price of product">
                            @error('old_price')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="quantity">Product Quantity <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('quantity') }}" class="form-control @error('quantity') border-danger @enderror" name="quantity" id="quantity" placeholder="enter quantity of product">
                            @error('quantity')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6 mt-2">
                            <label class="fs-4" for="status">Status <span class="text-secondary">(optional)</span></label>
                            <input type="text" value="{{ old('status') }}" class="form-control @error('status') border-danger @enderror" name="status" id="status" placeholder="enter status of product">
                            @error('status')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-12">
                            <label class="fs-4">Product image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') border-danger @enderror" name="image">
                            @error('image')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-4 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
