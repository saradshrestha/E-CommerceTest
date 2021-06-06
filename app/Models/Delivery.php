<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
     protected $fillable = [
        'user_id','name','address','city','email','country','province','phone_no','district',
    ];

    public function orders(){
    	return  $this->hasMany(Order::class,'delivery_id');
    }

    public function user(){
    	return  $this->belongsTo(User::class,'user_id');
    }


}
