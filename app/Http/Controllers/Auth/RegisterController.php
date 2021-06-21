<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUser;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /*protected $redirectTo = '/login';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required','string','unique:users'],
        ],
        [
            'name.required' => 'This field is required',
            'username.required' => 'This field is required', 
            'email.required' => 'This field is required',
            'email.email' => 'Invalid Email Address',
            'password.required' => 'This field is required',
            'username.unique' => 'This username already exist',
            'email.unique' => 'This email already exist',
            'email.confirmed' => 'This is does not match with the password',
            'password.min:8' => 'Password must be more than 8 characters',

         ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'role_id'=> 1 ,
            'status' => 1,
            'password' => Hash::make($data['password']),
        ]);
        Session::flash('success','Your account has been created. and Mail Has been sent');
        return redirect()->route('index');
    }
}
