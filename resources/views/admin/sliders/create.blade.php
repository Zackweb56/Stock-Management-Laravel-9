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
                    <h2 class="text-secondary">Add Slider Page</h2>
                    <a href="{{ route('sliders.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body w-100">
                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="d-flex w-100 flex-wrap">
                        @csrf
                        <div class="form-group col-lg-12 mt-2">
                            <label class="fs-4" for="title">Slider Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') border-danger @enderror" name="title" id="title" placeholder="enter slider title">
                            @error('title')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 mt-2">
                            <label class="fs-4" for="description">Product Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control @error('description') border-danger @enderror" cols="15" rows="3">

                            </textarea>
                            @error('description')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 col-lg-12">
                            <label class="fs-4">Product image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') border-danger @enderror" name="image">
                            @error('image')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="fs-4">Status <span class="text-danger">*</span></label><br>
                            <input type="checkbox" class="form-check-input" style="width: 20px;height: 20px;" name="status">&nbsp; Checked=Hidden,Unchecked=Visible
                        </div>
                        <button type="submit" class="btn btn-success mt-2 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
