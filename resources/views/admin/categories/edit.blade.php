@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-5 w-75">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-secondary">Edit Category Page</h2>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-50">
                    <form action="{{ route('categories.update', $categories->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="fs-4" for="category_name">Category Name</label>
                            <input type="text" value="{{ $categories->category_name }}" class="form-control" name="category_name" id="category_name" placeholder="enter category name">
                            @error('category_name')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small> 
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 w-100"><i class="fa-solid fa-refresh"></i>&nbsp; Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection