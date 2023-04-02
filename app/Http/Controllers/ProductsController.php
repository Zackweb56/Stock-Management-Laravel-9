<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


class ProductsController extends Controller
{
    // --------------------------------------------------
    public function index()
    {
        return view('admin.products.index')->with('products',Product::paginate(4));
    }

    // --------------------------------------------------

    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.create',compact('categories','brands'));
    }

    // --------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'product_name'  =>  'required',
            'description'   =>  'required',
            'new_price'     =>  'required|integer',
            'old_price'     =>  'integer',
            'quantity'      =>  'required|integer',
            'status'        =>  'string|nullable',
            'image'         =>  'required|image|mimes:png,jpg,jpeg|max:2048',
            'category_id'   =>  'required',
            'brand_id'      =>  'required',
        ]);

        $newImageId = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageId);

        Product::create([
            'product_name'  =>  $request->input('product_name'),
            'description'   =>  $request->input('description'),
            'new_price'     =>  $request->input('new_price'),
            'old_price'     =>  $request->input('old_price'),
            'quantity'      =>  $request->input('quantity'),
            'status'        =>  $request->input('status'),
            'image'         =>  $newImageId,
            'category_id'   =>  $request->input('category_id'),
            'brand_id'      =>  $request->input('brand_id'),
        ]);

        return redirect()->route('products.create')->with('success','Product Added Successfully !');
    }
    // --------------------------------------------------

    public function show($id)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.show', compact('categories','brands'))->with('products', Product::where('id',$id)->first());

    }

    // --------------------------------------------------

    public function edit($id)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.edit', compact('categories','brands'))->with('products', Product::where('id',$id)->first());
    }
    // --------------------------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'  =>  'required',
            'description'   =>  'required',
            'new_price'     =>  'required|integer',
            'old_price'     =>  'integer',
            'quantity'      =>  'required|integer',
            'status'        =>  'string|nullable',
            'image'         =>  'required|image|mimes:png,jpg,jpeg|max:2048',
            'category_id'   =>  'required',
            'brand_id'      =>  'required',
        ]);

        $newImageId = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageId);

        Product::where('id', $id)->update([
            'product_name'  =>  $request->input('product_name'),
            'description'   =>  $request->input('description'),
            'new_price'     =>  $request->input('new_price'),
            'old_price'     =>  $request->input('old_price'),
            'quantity'      =>  $request->input('quantity'),
            'status'        =>  $request->input('status'),
            'image'         =>  $newImageId,
            'category_id'   =>  $request->input('category_id'),
            'brand_id'      =>  $request->input('brand_id'),
        ]);

        return redirect()->route('products.index')->with('success','Product Updated Successfully !');
    }

    // --------------------------------------------------

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success','Product Deleted Successfully !');
    }

    // --------------------------------------------------

}
