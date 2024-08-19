<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = category::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'name' => 'required',
        'status' =>'required',
       ]);

       if($validator->fails()){
        return response()->json(['errors','errors'=>$validator->errors()],422);
       }

       if($validator->passes()){

        $category = new category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        session()->flash('success','Category created successfully');
        return response()->json(['redirect_url' => route('admin.category')]);
       }
    }

    public function edit($id){
        $category = category::find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
         'name' => 'required',
         'status' =>'required',
        ]);
 
        if($validator->fails()){
         return response()->json(['errors','errors'=>$validator->errors()],422);
        }
 
        if($validator->passes()){
 
         $category = category::find($id);
         $category->name = $request->name;
         $category->status = $request->status;
         $category->save();
         session()->flash('success','Category created successfully');
         return response()->json(['redirect_url' => route('admin.category')]);
        }
     }

     public function show($id){
        $category = category::find($id);
        return view('admin.categories.show',compact('category'));
    }

    public function destroy($id){
        $category = category::find($id);
        $category->delete();
        session()->flash('success','Category deletedc successfully');
        return redirect()->back();
    }
}
