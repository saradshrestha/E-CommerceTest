<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Auth;
use Session;

class ReviewController extends Controller
{
    public function addReview(Request $request, $slug){

      $request->validate([
      	'name' => ['required','string'],
      	'email' => ['email','unique:reviews,email'],
      	'description' => ['required'],
      	'rating' => ['Integer','required'],
    ],
 	[
 		'name.required' => "required",
 		'name.string' => 'Must Be a String',
 		'email.email' => 'Invalid Email Address',
 		'rating.required' => 'Rating is Required',
 		'descritpion.required' => 'Description is Required',
 		'rating.Integer' => 'Rating must a Number',
 		'rating.required' => 'Rating is required',
 	]);
      	$product=Product::where('product_slug',$slug)->first();
      	//$product_id = $product->id
       	$review = new Review;
       	if(Auth::guard ('web')->check()){
       		$review->user = Auth::id();
       		$review->name = Auth::user()->name;
       		$review->email = Auth::user()->email;
       	}
       	else
       	{    		
			$review->name = $request->get('name');
			$review->email = $request->get('email');
       	}

       	$review->review_details = $request->get('description');
       	$review->product_id = $product->id;
       	 $review->rating =  $request->rating;
       	$review->spam = 0;
       	$review->approved = 1;
       	$review->save();
       	 Session::flash ('success','Your Review has been added.');
       	 return redirect()->back();

    }
}
