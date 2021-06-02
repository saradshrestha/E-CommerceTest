<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id ){
    	
    	$session_id = Session::getId();
    
     		$request->validate([
     	 		'product_quantity' => ['required'], 	
     		],
     		[
     			'product_quantity.required' => 'Please enter Quantity',
     		]);
     		
    		$product = Product::where('id',$product_id)->first();
    		$cart= new Cart();
    		$cart->product_quantity =  $request->get('product_quantity');
    		$cart->product_id =  $product_id;
			$cart->session_id =  $session_id;
            if(Auth::guard('web')->check ())
            {
                 $cart->user_id = Auth::id(); 
            }

    		$cart->save();
        	return redirect()->back()->with('success','Product Added Successfully');
        
    	}

	


    public function showToCart(){
    	$current_session_id = Session::getId ();
	   	$carts= Cart::where('session_id', $current_session_id)->get();
    	$categories= Category::where('parent_id','!=','0')->get();
        global  $total_amount;
        foreach($carts as $cart) {
             $total_amount = ($cart->product->product_price * $cart->product_quantity) + $total_amount;
        }
                 
      
    	return view ('frontend.pages.cart',compact('carts','categories', 'total_amount'));
    }

    public function removeCart($id){

    	Cart::findOrFail($id)->delete();
    	return redirect()->back()->with('success','Cart Removed');

    }

    public function orderPlace(Request  $request){

        if( !Auth::guard('web')->check())
        {
            return redirect()->back()->with('error','Please Login To Checkout.');
        }
    }
}
