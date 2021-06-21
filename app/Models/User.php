<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon;
use App\Models\UserProfile;

class User extends Authenticatable
{
    use Notifiable;
    //protected  $guard ='web';
    
    protected $fillable = [
        'name', 'email', 'password','username','status','role_id',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function($user){
             $user->userprofile()->create([
                'display_img' =>'default_dp.jpeg'
             ]);
        });
    }

    public function cart(){
        return $this->hasMany(Cart::class,'user_id');
    }

    public function reviews(){
        return  $this->hasOne(Review::class,'user_id');
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class,'user_id');
    }

    public function userprofile (){
        return  $this->hasOne(UserProfile::class,'user_id');
    }
}
