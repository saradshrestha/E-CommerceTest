<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Session;
use App\Models\UserProfile;


class UserProfileController extends Controller
{
   public function showProfile($username){
        if($username == Auth::user()->username)
        {
             $user = User::where('username', $username)->first();
            return view ('frontend.pages.userMenu.userProfile',compact('user'));
        }
        else{
             return redirect()->back()->with('warning',"You Do not have permission to access");
        }      
    }

    public function editProfile($username){
    	return view('frontend.pages.userMenu.editProfile');
    }

    public function updateProfile(Request $request){
        //dd ( $request);
         $request->validate([
            'address' => ['required','string'],
            'phone' => ['required','integer'],
            'gender' => ['required','string'],
                    ],
        [
            'phone.required' => 'Required',
            'address.required' => 'Required',
            'gender.required' => 'Required',
            'phone.integer' => 'Must be a Number',
            'address.string' => 'Must be a String ',
            'gender.string' => 'Must be a String ',
                    
        ]);
         
        $user_id = Auth::guard('web')->id();
        //dd( $user_id);
        $userprofile = UserProfile::where('user_id',$user_id)->first();
        $userprofile->address =  $request->get('address');
        $userprofile->phone =  $request->get('phone');
        $userprofile->gender =  $request->get('gender');
        $userprofile->save();

        Session::flash('success','Your Profile has been updated');
    	return redirect()->route('showProfile', $username);
    }
}
