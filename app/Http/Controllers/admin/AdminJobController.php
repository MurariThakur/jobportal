<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\jobType;
use App\Models\createJob;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminJobController extends Controller
{
    //
    public function joblist(){
        $jobs = createJob::paginate(10);
        return view('admin.job.joblist',compact('jobs'));
    }

    public function create(){
        $user = Auth::user();
        $categories =category::where('status',1)->get();
        $jobtypes =jobType::where('status',1)->get();
        return view('admin.job.create',compact('user','categories','jobtypes'));
    }

    public function store(Request $request){
        $validator = validator::make($request->all(),[
            'title' =>"required|string",
            'category' => "required",
            'job_nature' =>'required',
            'vacancy' => "required",
            'location' => "required",
            'description' => "required",
            'keywords' => "required",
            'company_name' => "required",
            'experience' => "required",
        ]);

        if($validator->fails()){
            return response()->json(['errors','errors'=>$validator->errors()],422);
        }
        $user = Auth::user()->id;
        if($validator->passes()){

            $jobtype = new createJob();
            $jobtype->title = $request->title;
            $jobtype->category_id = $request->category;
            $jobtype->job_type_id = $request->job_nature;
            $jobtype->user_id = $user;
            $jobtype->vacancy = $request->vacancy;
            $jobtype->salary = $request->salary;
            $jobtype->location = $request->location;
            $jobtype->description = $request->description;
            $jobtype->benefits = $request->benefits;
            $jobtype->responsibility = $request->responsibility;
            $jobtype->qualifications = $request->qualifications;
            $jobtype->keywords = $request->keywords;
            $jobtype->experience = $request->experience;
            $jobtype->company_name = $request->company_name;
            $jobtype->company_location = $request->company_location;
            $jobtype->company_website = $request->company_website;

            $jobtype ->save();
            session()->flash('success','job created successfully');
            return response()->json(['redirect_url'=>route('admin.job.list')]);
        }
    }

    public function edit($id){
        $categories =category::where('status',1)->get();
        $jobtypes =jobType::where('status',1)->get();
        $jobs = createJob::find($id);;        
        return view('admin.job.edit',compact('jobs','categories','jobtypes'));
    }

    public function update(Request $request,$id){
        $validator = validator::make($request->all(),[
            'title' =>"required|string",
            'category' => "required",
            'job_nature' =>'required',
            'vacancy' => "required",
            'location' => "required",
            'description' => "required",
            'keywords' => "required",
            'company_name' => "required",
        ]);

        if($validator->fails()){
            return response()->json(['errors','errors'=>$validator->errors()],422);
        }
        $user = Auth::user()->id;
        if($validator->passes()){

            $jobtype = createJob::find($id);
            $jobtype->title = $request->title;
            $jobtype->category_id = $request->category;
            $jobtype->job_type_id = $request->job_nature;
            $jobtype->user_id = $user;
            $jobtype->vacancy = $request->vacancy;
            $jobtype->salary = $request->salary;
            $jobtype->location = $request->location;
            $jobtype->description = $request->description;
            $jobtype->benefits = $request->benefits;
            $jobtype->responsibility = $request->responsibility;
            $jobtype->qualifications = $request->qualifications;
            $jobtype->keywords = $request->keywords;
            $jobtype->experience = $request->experience;
            $jobtype->status = $request->status;
            $jobtype->isFeature = $request->isFeatured;
            $jobtype->company_name = $request->company_name;
            $jobtype->company_location = $request->company_location;
            $jobtype->company_website = $request->company_website;
            $jobtype ->save();
            session()->flash('success','job updated successfully');
            return response()->json(['redirect_url'=>route('admin.job.list')]);
        }
    }

    public function show($id){
        $jobs = createJob::find($id);;        
        return view('admin.job.show',compact('jobs'));
    }

    public function destroy($id){
        $job = createJob::find($id);
        $job->delete();
        session()->flash('success','Job deleted Successfully');
        return redirect()->back();
    }
}


