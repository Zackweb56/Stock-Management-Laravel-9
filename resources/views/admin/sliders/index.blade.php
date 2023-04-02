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
                <h1 class="text-secondary">sliders Admin Page</h1>
                <a href="{{ route('sliders.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>&nbsp; Add New Slider</a>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th class="w-25">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td><img src={{ url("/images/$slider->image") }} class="img-circle" width="60px" alt="slider_img"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <span class="bg-warning text-white py-1 px-2 w-25">
                                        @if ( $slider->status == 0 )
                                            Visible
                                        @else
                                            Hidden
                                        @endif
                                    </span>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary mx-1"><i class="fa-solid fa-edit"></i>&nbsp; Update</a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure you want to delete this Product?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i>&nbsp; Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <span class="text-danger fs-2 bg-danger text-white p-2">No Data Category Available !</span>
                        @endforelse
                    </tbody>
                </table>

                {{ $sliders->links() }}

            </div>
        </div>
    </div>
@endsection
