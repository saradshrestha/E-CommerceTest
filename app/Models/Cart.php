<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = [
        'product_quantity','session_id','product_id',
    ];


    public function product(){
    	return $this->belongsTo(Product::class,'product_id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }


}
