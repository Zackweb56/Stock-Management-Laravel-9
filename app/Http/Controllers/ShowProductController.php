<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function show($id)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('user.pages.show', compact('categories','brands'))->with('products', Product::where('id',$id)->first());

    }
}
