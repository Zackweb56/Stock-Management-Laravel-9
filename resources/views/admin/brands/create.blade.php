@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-5 w-75">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong>{{ $message }}
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary">Add Brands Page</h2>
                    <a href="{{ route('brands.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-50">
                    <form action="{{ route('brands.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="fs-4" for="brand_name">Brand Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('brand_name') border-danger @enderror" name="brand_name" id="brand_name" placeholder="enter brand name">
                            @error('brand_name')
                                <small class="fs-5 text-danger mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-2 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
