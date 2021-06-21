<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Session;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function passwordChange(){
    	return view  ('frontend.pages.userMenu.changePassword');
    }
    
    public function passwordChangeSubmit(Request $request){
             $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['same:new_password','required'],
        ],
        [
            'current_password.required' => 'Required',
            'current_password.new MatchOldPassword' => 'Current Password Does Not Match',
            'new_password.required' =>  'Required',
            'new_password.min' => 'Password must have more than 8 characters',
            'confirm_password.required' => 'Required',
            'confirm_password.same' =>  'Confirm Password Does not Match with New Password'
        ]);

        User::find(Auth::guard('web')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Session::flash ('success', 'Password Changeed Successfully');
        Return redirect()->route('showProfile', Auth::guard('web')->user()->username );
    }


 
}
