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
                <h1 class="text-secondary">Products Admin Page</h1>
                <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>&nbsp; Add New Product</a>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Product name</th>
                            <th>description</th>
                            <th>category</th>
                            <th>brand</th>
                            <th>Selling price (Dh)</th>
                            <th>Old price (Dh)</th>
                            <th>quantity</th>
                            <th>Status</th>
                            <th class="w-25">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src={{ url("/images/$product->image") }} width="60px" alt="img">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>{{ $product->brand->brand_name }}</td>
                                <td>{{ $product->new_price }}Dh</td>
                                <td>{{ $product->old_price }}Dh</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if ($product->status)
                                        <span class="bg-danger text-white py-1 px-2 w-25">{{ $product->status }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mb-2"><i class="fa-solid fa-edit"></i>&nbsp; Update</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure you want to delete this Product?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp; Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <span class="text-danger fs-2 bg-danger text-white p-2">No Data Product Available !</span>
                        @endforelse
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
