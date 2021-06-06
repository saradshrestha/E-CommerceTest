<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'name', 'review_details','spam','approved','user_id','email',
    ];
    public function product(){
    	return $this->belongsTo(Product::class,'product_id');

    }
    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    	
    }
}
