<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    protected $fillable = [
        'title', 'slug', 'details','parent_id','status','created_at','updated_at','code','image',
    ];
//Relation with maincategory i.e categort->parent_id
    //To show subcategories Under Main Category
  public function mainCategory(){
    	return $this->hasMany(Category::class,'parent_id');
 }
//Relation with subcategory i.e categort->id
    //To show Main Category of a Sub Category
    public function subCategory(){
    	return $this->belongsTo(Category::class,'parent_id');
    }

//Relation with product i.e product->category_id
    //To show the products of the category
     public function products(){
    	return $this->hasMany(Product::class,'category_id');
    }
}
