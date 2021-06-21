<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
     protected  $guard ='web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'phone', 'display_img','gender','dob',
    ];

     public function user(){
    	return $this->belongsTo(User::class,'user_id');
    	
    }
}
