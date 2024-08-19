<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\jobType;
use App\Models\createJob;
use App\Models\jobApplication;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Validator;
class JobController extends Controller
{
    //
    public function jobpost(){
        $user = Auth::user();
        $categories =category::where('status',1)->get();
        $jobtypes =jobType::where('status',1)->get();
        return view('frontend.jobs.jobpost',compact('user','categories','jobtypes'));
    }

    public function createjob(Request $request){
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
            $jobtype->qualifications = $request->qualification;
            $jobtype->keywords = $request->keywords;
            $jobtype->experience = $request->experience;
            $jobtype->company_name = $request->company_name;
            $jobtype->company_location = $request->company_location;
            $jobtype->company_website = $request->company_website;

            $jobtype ->save();
            session()->flash('success','job created successfully');
            return response()->json(['redirect_url'=>route('frontend.myjobs')]);
        }
    }

    public function myjobs(){
        $user = Auth::user();
        $jobs = createJob::where('status',1)->where('user_id',$user->id)->with('jobType')->paginate(10);
        return view('frontend.jobs.myjobs',compact('user','jobs'));
    }

    public function myjobsedit($id){
        $user = Auth::user();
        $categories =category::where('status',1)->get();
        $jobtypes =jobType::where('status',1)->get();
        $jobs = createJob::find($id);;
        if(!$jobs || $jobs->user_id != $user->id){
            abort(404);
        }
        
        return view('frontend.jobs.myjobsedit',compact('jobs','user','categories','jobtypes'));
    }

    public function myjobupdate(Request $request,$id){
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
            $jobtype->company_name = $request->company_name;
            $jobtype->company_location = $request->company_location;
            $jobtype->company_website = $request->company_website;
            $jobtype ->save();
            session()->flash('success','job updated successfully');
            return response()->json(['redirect_url'=>route('frontend.myjobs')]);
        }
    }

    public function jobdelete($id){
        $user = Auth::user();
        $jobs = createJob::find($id);
        if(!$jobs || $jobs->user_id != $user->id){
            abort(404);
        }

        $jobs->delete();
        session()->flash('success','Job deleted successfully');

        return redirect()->route('frontend.myjobs')->with('success', 'Job deleted successfully.');
    }

    public function jobApplied(){
        $user = Auth::user();
        $jobApplied = jobApplication::where('user_id',$user->id)->with('job')->get();
        // dd($jobApplied);
        return view('frontend.jobs.jobApplied',compact('user','jobApplied'));
    }


    public function jobApplieddelete($id){
        $user = Auth::user();
        $jobs = jobApplication::find($id);
        if(!$jobs || $jobs->user_id != $user->id){
            abort(404);
        }

        $jobs->delete();
        session()->flash('success','Job deleted successfully');

        return redirect()->back();
    }

    public function jobSaved(){
        $user = Auth::user();
        $jobSaved = SavedJob::where('user_id',$user->id)->with('job')->get();
        // dd($jobSaved);
        return view('frontend.jobs.jobSaved',compact('user','jobSaved'));
    }

    public function jobSavedelete($id){
        $user = Auth::user();
        $jobs = SavedJob::find($id);
        if(!$jobs || $jobs->user_id != $user->id){
            abort(404);
        }

        $jobs->delete();
        session()->flash('success','Job deleted successfully');

        return redirect()->back();
    }
}
