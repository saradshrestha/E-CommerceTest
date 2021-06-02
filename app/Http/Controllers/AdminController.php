<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Auth;
use Hash;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function passwordChange(){
        return view ('backend.auth.passwordChange');
    }

    public function passwordChangeSubmit(Request $request){
             $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_new_password' => ['same:new_password','required'],
        ],
        [
            'current_password.required' => 'Required',
            'current_password.new MatchOldPassword' => 'Current Password Does Not Match',
            'new_password.required' =>  'Required',
            'new_password.min' => 'Password must have more than 8 characters',
           'confirm_new_password.required' => 'Required',
           'confirm_new_password.same' =>  'Confirm Password Does not Match with New Password'
        ]);

        Admin::find(Auth::guard('admin')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Session::flash ('success', 'Password Changeed Successfully');
        Return redirect ()->route('adminDashboard');
    }


    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
