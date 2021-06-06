<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Delivery;

class OrderController extends Controller
{
  	public function addOrder( Request  $request ){
  		if (!Auth::guard('web')->check() )
  		{
  			return redirect()->route('login')->with('error','Please LogIn To Place The Order');
  		}
  			
  		$current_session= Session::getId();
 		$user_id = Auth()->id();
 		$carts = Cart::where('session_id', $current_session)->where('user_id', $user_id)->get();
 		$products_id = Cart::select('product_id')->where('session_id', $current_session)->where('user_id', $user_id)->get()->toArray();
 		//dd ( $products_id);
 		global  $total_amount;
        foreach($carts as $cart) {
             $total_amount = ($cart->product->product_price * $cart->product_quantity) + $total_amount;
        	
        }	
        

  		$request->validate([
	      	'name' => ['required','string'],
	      	'email' => ['email'],
	      	'phone' => ['required','Integer'],
	      	'address' =>['required','string'],
	      	'city' => ['required','string'],
	      	'country' => ['required','string'],
	      	'province' => ['required','string'],
	      	'district' => ['required','string'],
	      	'terms'=>['required'],
	    ],
	 	[
	 		
	 		'name.required' => "Required",
	 		'name.string' => 'Must Be a String',
	 		'address.required' => "Required",
	 		'address.string' => 'Must Be a String',
	 		'city.required' => "Required",
	 		'city.string' => 'Must Be a String',
	 		'country.required' => "Required",
	 		'country.string' => 'Must Be a String',
	 		'district.required' => "Required",
	 		'district.string' => 'Must Be a String',

	 		'email.email' => 'Invalid Email Address',
	 		'phome.required' => 'Rating is Required',
	 		'phone.Integer' => 'Description is Required',
	 		
	 		'terms.required' => 'Terms and Conditions should be checked',
 		]);

 		$delivery = new Delivery();
 		$delivery->name =  $request->get ('name');
 		$delivery->email =  $request->get ('email');
 		$delivery->phone_no =  $request->get ('phone') ;  
 		$delivery->address =  $request->get ('address');
 		$delivery->city =  $request->get ('city');
 		$delivery->district =  $request->get ('district');
 		$delivery->province =  $request->get ('province');
 		$delivery->country =  $request->get ('country');
 		$delivery->user_id = $user_id;
 		$delivery->save();

 		
		$order = new Order();
		 $order->total_amount =  $total_amount;
		 $order->is_delivered = 0;
		 $order->user_id =  $user_id;
		 $order->delivery_id =  $delivery->id;
		 $order->delivery_method = $request->get('payment');
		 

		  $order->save();
		  $order->products()->sync($products_id,true);
		  
		  return redirect()->back()->with ('success','Order Place Successfully');
 		 		
  	}

  	public function viewOrders(){

         $orders = Order::where ('user_id',Auth::guard('web')->id())->get();
         
    	return view('frontend.pages.userMenu.viewOrder',compact('orders') )->with('no',1);

    }
}
