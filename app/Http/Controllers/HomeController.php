<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('user.pages.home',compact('categories','brands'))->with('products', Product::get())->with('sliders', Slider::where('status','0')->get());
    }
    // --------------------------------------------------
    public function filterByCategory($category)
    {
        $products = Product::whereHas('categories', function ($query) use ($category){
            $query->where('category', $category);
        })->get();
        return redirect()->route('products.index', compact('products'));
    }
}
