<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
// -----------------------------------------------------
    public function index()
    {
        return view('admin.brands.index')->with('brands',Brand::paginate(4));
    }

// -----------------------------------------------------

    public function create()
    {
        return view('admin.brands.create');
    }

// -----------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'brand_name'    =>  'required',
        ]);

        Brand::create([
            'brand_name'    =>  $request->input('brand_name'),
        ]);

        return redirect()->route('brands.create')->with('success','Brand Added Successfully !');
    }

// -----------------------------------------------------

    public function show($id)
    {
        //
    }

// -----------------------------------------------------

    public function edit($id)
    {
        return view('admin.brands.edit')->with('brands', Brand::where('id',$id)->first());
    }

// -----------------------------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name'    =>  'required',
        ]);

        Brand::where('id',$id)->update([
            'brand_name'    =>  $request->input('brand_name'),
        ]);

        return redirect()->route('brands.index')->with('success','Brand Updated Successfully !');
    }
// -----------------------------------------------------

    public function destroy($id)
    {
        Brand::where('id', $id)->delete();

        return redirect()->route('brands.index')->with('success','Brand Deleted Successfully !');
    }
}
