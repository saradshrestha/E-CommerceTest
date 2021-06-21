<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
        'user_id','is_delivered','delivery_method','total_amount','delivery_id',
    ];

    public function delivery(){
    	return  $this->belongsTo(Delivery::class,'delivery_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_products')->withPivot('quantity');
    }
    


}
