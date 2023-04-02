<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
// ------------------------------
    public function index()
    {
        return view('admin.sliders.index')->with('sliders', Slider::paginate(4));
    }
// ------------------------------

    public function create()
    {
        return view('admin.sliders.create');
    }

// ------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'description'   =>  'required|nullable',
            'status'        =>  'nullable',
            'image'         =>  'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $newImageId = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageId);

        $status = $request->input('status') == true ? '1':'0';

        Slider::create([
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'status'        =>  $status,
            'image'         =>  $newImageId,
        ]);

        return redirect()->route('sliders.create')->with('success','Slider Added Successfully !');
    }

// ------------------------------

    public function show($id)
    {
        //
    }

// ------------------------------

    public function edit($id)
    {
        return view('admin.sliders.edit')->with('sliders', Slider::where('id', $id)->first());
    }

// ------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         =>  'required',
            'description'   =>  'required|nullable',
            'status'        =>  'nullable',
            'image'         =>  'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $newImageId = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageId);

        $status = $request->input('status') == true ? '1':'0';

        Slider::where('id', $id)->update([
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'status'        =>  $status,
            'image'         =>  $newImageId,
        ]);

        return redirect()->route('sliders.index')->with('success','Slider Updated Successfully !');
    }
// ------------------------------

    public function destroy($id)
    {
        //
    }
}
