@extends('admin.dashboard')

@section('dashboard')

    <div class="container mx-2 mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{ $message }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="text-secondary">Categories Admin Page</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>&nbsp; Add New Categories</a>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="w-50">name</th>
                            <th class="w-25">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa-solid fa-edit"></i>&nbsp; Update</a>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i>&nbsp; Delete</a>
                                </td>
                            </tr>
                        @empty
                            <span class="text-danger fs-2 bg-danger text-white p-2">No Data Category Available !</span>
                        @endforelse
                    </tbody>
                </table>

                {{ $categories->links() }}

            </div>
        </div>
    </div>
@endsection
