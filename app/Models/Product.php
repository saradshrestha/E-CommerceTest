<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
     protected $fillable = [
        'product_name', 'product_slug', 'product_details','product_image','product_status','product_code','featured_product','created_at','updated_at','category_id',
    ];

    //Relation with Category Table showing category that belongs to a Product
    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class,'product_id');
    }

    public function reviews (){
        return  $this->hasMany(Review::class,'product_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_products');
    }

}
