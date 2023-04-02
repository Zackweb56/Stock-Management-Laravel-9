<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShowProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class,'index'])->name('pages.home');
Route::get('/products/category/{category}', [HomeController::class,'filterByCategory'])->name('home.filter');

Auth::routes();


Route::prefix('user')->middleware(['auth'])->group(function (){
    Route::resource('wishlists', WishlistsController::class);

    Route::get('/about', function (){
        return view('user.pages.about');
    })->name('pages.about');

    Route::get('/pages/show/{id}',[ShowProductController::class,'show'])->name('user.show');

});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');

    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('brands', BrandsController::class);
    Route::resource('sliders', SlidersController::class);
});
