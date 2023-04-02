@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-5 w-75">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{$message}}
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary">Add Category Page</h2>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-50">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="fs-4" for="category_name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('category_name') border-danger @enderror" name="category_name" id="category_name" placeholder="enter category name">
                            @error('category_name')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-2 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
