<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Str;

class CategoryController extends Controller
{

    //Category Listings
        public function index()
        {
            $categories = Category::orderBy('created_at', 'DESC' )->paginate(10);
            return view('backend.category.index',compact('categories'));
        }


    //Category Create
        public function create()
        {

            $main_cats= Category::where('parent_id' , 0)->get();
            /*$sub_cats = Category::where ('parent_id','!=',0)->get();*/
            return view('backend.category.create',compact('main_cats')); 
        }


    //Category Store
        public function store(Request $request)
        {
            $request->validate([
                'title' => ['required','unique:categories,title'],
                'details' => ['required'],
                'parent_id' => ['required'],
                'status' => ['required'],
                'image' => ['required'],
            ],
            [
                'details.required' => 'Required',
                'title.required' =>  'Required',
                'title.unique' =>  'Already Exits',
                'parent_id.required' => 'Required',
                'status.required' => 'Required',
                'image.required' =>  'Required'
            ]);

            $category = new Category();
            $category->title =  $request->get('title');
            $category->details =  $request->get('details');
            $category->parent_id =  $request->get('parent_id');
            $category->status =  $request->get('status');
            $category->slug =  Str::slug($request->title);
            $category->code = $request->get('code');

            if($file = $request->hasFile('image')) {
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/Category/uploads/' ;
                $file->move($destinationPath,$fileName);
                $category->image = $fileName;
            }
            $category->save();
            Session::flash('success','Category Added Successfully.');
            return redirect ()->route ('categoryIndex');
           /*  $data=$request->all();
             dd ($data);*/
        }


    //Category Edit
        public function edit(Category $category)
        {
            $main_cats= Category::where('parent_id', 0)->get();
            /*$sub_cats = Category::where ('parent_id','!=',0)->get();*/
            return view('backend.category.edit',compact('category','main_cats'));
        }


    //Category Update 
        public function update(Request $request, Category $category)
        {
             $request->validate([
                'title' => ['required'],
                'details' => ['required'],
                'parent_id' => ['required'],
                'status' => ['required'],
                'image' => ['required'],
                'code' => ['required'],

            ],
            [
                'details.required' => 'Required',
                'code.required' => 'Required',
                'title.required' =>  'Required',
                'status.required' =>  'Required',
                'parent_id.required' => 'Required',
                'image.required' =>  'Required'
            ]);
             //dd ( $category->id);
            $category = Category::findOrFail($category->id);
            $category->title =  $request->get('title');
            $category->details =  $request->get('details');
            $category->parent_id =  $request->get('parent_id');
            $category->status =  $request->get('status');
            $category->slug =  Str::slug($request->title);
            $category->code = $request->get('code');

            if($file = $request->hasFile('image')) {
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/Category/uploads/' ;
                $file->move($destinationPath,$fileName);
                $category->image = $fileName;
            }
            $category->save();

            Session::flash('success','Category Updated Successfully.');
            return redirect ()->route ('categoryIndex');
        }


    //Category Delete
        public function destroy(Category $category)
        {
            $category->delete();
            DB::table ('categories')->where('parent_id', $category->id)->delete();
                         
            $success = true;
            $message = "Category deleted successfully";
            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);
            return redirect()->route('categoryIndex');
        }

    public function changeStatus(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();

  

        return response()->json(['success'=>'Status change successfully.']);

    }
}
