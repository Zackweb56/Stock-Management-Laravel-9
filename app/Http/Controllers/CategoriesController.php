<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
// -----------------------------------------------------

    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::paginate(4));
    }

// -----------------------------------------------------

    public function create()
    {
        return view('admin.categories.create');
    }
// -----------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'category_name'  =>  'required',
        ]);

        Category::create([
            'category_name'  =>  $request->input('category_name'),
        ]);

        return redirect()->route('categories.create')->with('success','Category Added Successfully !');
    }
// -----------------------------------------------------

    public function show($id)
    {
        //
    }
// -----------------------------------------------------

    public function edit($id)
    {
        return view('admin.categories.edit')->with('categories', Category::where('id', $id)->first());
    }

// -----------------------------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'  =>  'required',
        ]);

        Category::where('id', $id)->update([
            'category_name'  =>  $request->input('category_name'),
        ]);

        return redirect()->route('categories.index')->with('success','Category Added Successfully !');
    }

// -----------------------------------------------------

    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('categories.index')->with('success','Category Deleted Successfully !');

    }
}
