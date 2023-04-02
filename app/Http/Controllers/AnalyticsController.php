<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalUsers = User::where('utype','0')->count();
        $totalAdmins = User::where('utype','1')->count();

        return view('admin.analytics', compact('totalProducts','totalCategories','totalBrands','totalUsers','totalAdmins'));
    }
}
