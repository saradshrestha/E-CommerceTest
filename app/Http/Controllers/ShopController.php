<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Review;
use Session;

class ShopController extends Controller
{

    
	
    //For Displaying Products With Featured, Latest and All Products
    public function index(){
    	$latestproducts = Product::where('product_status', 1)->latest()->take(5)->get(); 
    	$categories= Category::where('parent_id','!=','0')->get();
    	$products = Product::where('product_status', 1)->get();
    	$featuredProducts = Product::where('product_status', 1)->where('featured_product',1)->get();
        $currentsession_id = Session::getId ();
        $carts= Cart::where('session_id', $currentsession_id)->get();
    	return view('frontend.pages.index',compact('products','categories','latestproducts','featuredProducts','carts'));
    }

    //For Displaying Single Product
    public function productShow($slug){
    	$product = Product::where('product_slug', $slug)->first();
    	$relatedProducts = Product::where('category_id', $product->category_id)->where('id','!=', $product->id)->take(5)->get();
    	$categories= Category::where('parent_id','!=','0')->get();
        $currentsession_id = Session::getId ();
        $carts= Cart::where('session_id', $currentsession_id)->get();
        $avg_rating =  $product->reviews->avg('rating');
        $t_rating = number_format($avg_rating);

        $rating1= Review::select('rating')->where('product_id', $product->id)->where('rating','1')->count();
        $rating2= Review::select('rating')->where('product_id', $product->id)->where('rating','2')->count();
        $rating3= Review::select('rating')->where('product_id', $product->id)->where('rating','3')->count();
        $rating4= Review::select('rating')->where('product_id', $product->id)->where('rating','4')->count();
        $rating5= Review::select('rating')->where('product_id', $product->id)->where('rating','5')->count();
                





    	return view ('frontend.pages.productShow',compact('product','relatedProducts','categories','carts','t_rating','rating1','rating2','rating3','rating4','rating5'));
    }

    //For Displaying Products According To Category
    public function categoryShow($slug){
     	$category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->paginate('2');
     	$categories= Category::where('parent_id','!=','0')->get();
        $currentsession_id = Session::getId ();
        $carts= Cart::where('session_id', $currentsession_id)->get();
     	return view ('frontend.pages.categoryShow',compact('category','products','categories','carts')  );
    }

    // For Displaying All Products according to Request as Featured, Latest, All Products
    public function productList(Request  $request){


        if ( $request->data == 'latest'){
            $products= Product::where('product_status',1)->latest()->paginate('10');
            $categories= Category::where('parent_id','!=','0')->get();
        }
        elseif( $request->data == 'featured')
        {
            $products= Product::where('product_status',1)->where('featured_product','1')->paginate('10');
            $categories= Category::where('parent_id','!=','0')->get();
        }
        else
        {
            $products= Product::where('product_status',1)->paginate('10');
            $categories= Category::where('parent_id','!=','0')->get();
        }
     	$currentsession_id = Session::getId ();
        $carts= Cart::where('session_id', $currentsession_id)->get();
     	return view('frontend.pages.productList',compact('products','categories','carts'));

     }

}
