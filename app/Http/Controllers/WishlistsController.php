<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class WishlistsController extends Controller
{
// -----------------------------------------------
    public function index()
    {
        $products = Product::get();
        $TotalWishlist = Wishlist::where('user_id',Auth::user()->id)->count();
        return view('user.wishlists.index',compact('TotalWishlist','products'))->with('wishlists',Wishlist::where('user_id',Auth::user()->id)->get());
    }
// -----------------------------------------------

    public function create()
    {
        //
    }

// -----------------------------------------------

    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        if (Wishlist::where('user_id',Auth::user()->id)->where('product_id',$productId)->exists()) {
            return redirect()->route('pages.home')->with('failed','Product alredy exists in Wishlist !');
        }else{
            Wishlist::create([
                'user_id'       =>  Auth::user()->id,
                'product_id'    =>  $productId
            ]);

            return redirect()->route('pages.home')->with('success','Product Added Successfully to Wishlist !');
        }
    }
// -----------------------------------------------

    public function show($id)
    {
        //
    }

// -----------------------------------------------

    public function edit($id)
    {
        //
    }
// -----------------------------------------------

    public function update(Request $request, $id)
    {
        //
    }

// -----------------------------------------------

    public function destroy($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect()->route('wishlists.index')->with('success','Product Deleted Successfully !');
    }
}
