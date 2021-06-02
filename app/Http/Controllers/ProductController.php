<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Str;
use Session;
class ProductController extends Controller
{
    public function index()
    {
         $products = Product::orderBy('created_at', 'DESC' )->paginate('10');
         /*
         foreach ( $products as  $product) {
         	dd($product->category->id);
         }*/
        return view('backend.product.index',compact('products'));
    }

     public function create()
    {
    	$main_cats = Category::where('parent_id',0 )->get();
    	//$sub_cats = Category::where('parent_id','!=',0 )->get();

        return view('backend.product.create',compact('main_cats') );
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required','unique:products,product_name'],
            'product_details' => ['required'],
            'category_id' => ['required'],
            'product_status' => ['required'],
            'image' => ['required'],
            'product_price' => ['required'],
            'product_status' => ['required'],
            'featured_product' => ['required'],
           
        ],
        [
            'product_details.required' => 'Required',
            'product_name.required' =>  'Required',
            'product_name.unique' =>  'Already Exits',
            'category_id.required' => 'Required',
            'product_status.required' => 'Required',
            'image.required' =>  'Required',
            'product_price.required' =>  'Required',
            'product_status.required' =>  'Required',
            'featured_product.required' =>  'Required',
            

        ]);

        $product = new Product();
        $product->product_name =  $request->get('product_name');
        $product->product_details =  $request->get('product_details');
        $product->product_price =  $request->get('product_price');
        $product->product_status =  $request->get('product_status');
        $product->product_code = $request->get('product_code');
        $product->featured_product =  $request->get('featured_product');
        $product->product_slug =  Str::slug($request->product_name);
        $product->category_id =  $request->get('category_id');


        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/Products/uploads/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName;
        }
           

    

        $product->save();

        Session::flash('success','Product Added Successfully.');
        return redirect()->route('productIndex');
       /*  $data=$request->all();
         dd ($data);*/
    }


    public function edit(Product $product)
    {
        $main_cats = Category::where('parent_id',0 )->get();
        /*$sub_cats = Product::where ('parent_id','!=',0)->get();*/
        return view('backend.product.edit',compact('product','main_cats'));
    }

    public function update (Product  $product, Request $request)
    {
        $request->validate([
            'product_name' => ['required'],
            'product_details' => ['required'],
            'category_id' => ['required'],
            'product_status' => ['required'],
            'image' => ['required'],
            'product_price' => ['required'],
            'product_status' => ['required'],
            'featured_product' => ['required'],
        ],
        [
            'product_details.required' => 'Required',
            'product_name.required' =>  'Required',
         
            'category_id.required' => 'Required',
            'product_status.required' => 'Required',
            'image.required' =>  'Required',
            'product_price.required' =>  'Required',
            'product_status.required' =>  'Required',
            'featured_product.required' =>  'Required',
        ]);
        $product = Product::findOrFail($product->id);
        $product->product_name =  $request->get('product_name');
        $product->product_details =  $request->get('product_details');
        $product->product_price =  $request->get('product_price');
        $product->product_status =  $request->get('product_status');
        $product->product_code = $request->get('product_code');
        $product->featured_product =  $request->get('featured_product');
        $product->product_slug =  Str::slug($request->product_name);
        $product->category_id =  $request->get('category_id');

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/Products/uploads/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName;
        }
          
        $product->save();
        Session::flash('success','Product Updated Successfully.');
        return redirect()->route('productIndex');
       /*  $data=$request->all();
         dd ($data);*/
    }
    

    public function destroy(Product $product)
    {
        $product->delete();
        $success = true;
        $message = "Product deleted successfully";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        return redirect()->route('productIndex');
    }



    public function changeFeature(Request $request)
    {
        if ($request->ajax()) {
            if($request->status == 1) {
                    $status = 0;
                }
            else{
                    $status = 1;
            }
        $product_id =  $request->product_id;
        Product::findOrFail($request->product_id)->update(['featured_product' => $status]);


        return response()->json(['success'=>'Status changed successfully.',
                                'status'=> $status,
                                'product_id' => $product_id]);
        }
    }


    public function changeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->product_status = $request->status;
        $product->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
