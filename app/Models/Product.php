<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'image',
        'description',
        'new_price',
        'old_price',
        'quantity',
        'status',
        'category_id',
        'brand_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
}
