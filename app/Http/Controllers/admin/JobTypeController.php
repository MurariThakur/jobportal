<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jobType;
use Illuminate\Support\Facades\Validator;

class JobTypeController extends Controller
{
    //
    public function index(){
        $jobtypes = jobType::paginate(10);
        return view('admin.jobtype.index',compact('jobtypes'));
    }

    public function create(){
        return view('admin.jobtype.create');
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'name' => 'required',
        'status' =>'required',
       ]);

       if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
       }

       if($validator->passes()){

        $jobtype = new jobType();
        $jobtype->name = $request->name;
        $jobtype->status = $request->status;
        $jobtype->save();
        session()->flash('success','jobtype created successfully');
        return redirect()->route('admin.jobtype');
       }
    }

    public function edit($id){
        $jobtype = jobType::find($id);
        return view('admin.jobtype.edit',compact('jobtype'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
         'name' => 'required',
         'status' =>'required',
        ]);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        if($validator->passes()){
 
         $jobtype = jobType::find($id);
         $jobtype->name = $request->name;
         $jobtype->status = $request->status;
         $jobtype->save();
         session()->flash('success','Job Type updated successfully');
         return redirect()->route('admin.jobtype');
        }
     }

     public function show($id){
        $jobtypes = jobType::find($id);
        return view('admin.jobtype.show',compact('jobtypes'));
    }

    public function destroy($id){
        $jobtype = jobType::find($id);
        $jobtype->delete();
        session()->flash('success','Job Type deletedc successfully');
        return redirect()->back();
    }
}
