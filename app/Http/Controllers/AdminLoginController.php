<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Session;

class AdminLoginController extends Controller
{
	//Admin LogIn Page View
    public function adminLogin(){
    	return view('backend/auth/adminlogin');
    }

   //Admin Email and Password Check 
    public function adminLoginSubmit(Request  $request){
    	 $data =  $request->all ();;
    	 if(Auth::guard('admin')->attempt(['email' =>  $data['email'], 'password' =>  $data['password']]) ){
    	 	return redirect()->route('adminDashboard')->with('success','LogIn Successful.');
    	 }
    	 else
    	 {
    	 	return redirect()->back()->with('error','Email and Password Does not Match');
    	 }
    }


    // Admin Dashboard View
    public function dashboard()
    {
       return view('backend.dashboard');
    }

	//Admin Logout 
    public function adminLogout(Admin $admin){
    	Auth::guard('admin')->logout ();

     return redirect()->route('adminLogin');
    }

}
