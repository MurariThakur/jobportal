<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\jobType;
use App\Models\createJob;
use App\Models\User;
use App\Models\jobApplication;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobNotificationEmail;

class FindJobController extends Controller
{
    //
    public function index(Request $request) {
        $categories = category::where('status',1)->get();
        $jobTypes = jobType::where('status',1)->get();

        $jobs = createJob::where('status',1);

        // Search using keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function($query) use ($request) {
                $query->orWhere('title','like','%'.$request->keyword.'%');
                $query->orWhere('keywords','like','%'.$request->keyword.'%');
            });
        }

        // Search using location
        if(!empty($request->location)) {
            $jobs = $jobs->where('location',$request->location);
        }

        // Search using category
        if(!empty($request->category)) {
            $jobs = $jobs->where('category_id',$request->category);
        }

        $jobTypeArray = [];
        // Search using Job Type
        if(!empty($request->jobType)) {
            $jobTypeArray = explode(',',$request->jobType);

            $jobs = $jobs->whereIn('job_type_id',$jobTypeArray);
        }

        // Search using experience
        if(!empty($request->experience)) {
            $jobs = $jobs->where('experience',$request->experience);
        }


        $jobs = $jobs->with(['jobType','category']);

        if($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at','ASC');
        } else {
            $jobs = $jobs->orderBy('created_at','DESC');
        }
        

        $jobs = $jobs->paginate(9);


        return view('frontend.job',[
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }

    public function details($id){
        $jobs = createJob::find($id);

        if($jobs ==null){
            abort(404);
        }

        $isSaved = false;

        $isApplied = false;

        if (Auth::check()) {
            $isSaved = SavedJob::where('user_id', Auth::id())
                                ->where('create_job_id', $id)
                                ->exists();
        }
        if (Auth::check()) {
            $isApplied = jobApplication::where('user_id', Auth::id())
                                ->where('create_job_id', $id)
                                ->exists();
        }
        return view('frontend.jobdetails',compact('jobs','isSaved','isApplied'));
    }

    public function applyjob(Request $request,$id){

        $id = $request->id;
        // dd($id);
        $user = Auth::user()->id;
        

        $job = createJob::where('id',$id)->first();
        // dd($job);

        if ($job == null) {
            session()->flash('error','Job does not exist.');
            return redirect()->back();
        }

        $employer_id = $job->user_id;

        if($employer_id == $user){
            session()->flash('error','You can not apply on your own job.');
            return redirect()->back();
        }

        $jobapplied = jobApplication::where(['user_id'=>$user,'create_job_id'=>$id])->count();

        if($jobapplied >0){
            session()->flash('error','You already applied on this job.');
            return redirect()->back();
        }

        $application = new jobApplication();
        $application->create_job_id = $id;
        $application->user_id = $user;
        $application->employer_id = $employer_id;
        $application->applied_date = now();
        $application->save();

        $employer = User::where('id',$employer_id)->first();
        // $mailData =[
        //     'employer' =>$employer,
        //     'user' => Auth::user(),
        //     'job' => $job
        // ];
        // Mail::to($employer->email)->send(new JobNotificationEmail($mailData));
        session()->flash('success','job applies successfully');

        return redirect()->back();

    }

    public function savejob(Request $request,$id){

        $id = $request->id;
        $user = Auth::user()->id;
        

        $job = createJob::where('id',$id)->first();

        if ($job == null) {
            session()->flash('error','Job does not exist.');
            return redirect()->back();
        }

        $employer_id = $job->user_id;

        if($employer_id == $user){
            session()->flash('error','You can not save on your own job.');
            return redirect()->back();
        }

        $jobapplied = SavedJob::where(['user_id'=>$user,'create_job_id'=>$id])->count();

        if($jobapplied >0){
            session()->flash('error','You already save  this job.');
            return redirect()->back();
        }

        $application = new SavedJob();
        $application->create_job_id = $id;
        $application->user_id = $user;
        $application->save();

        // $employer = User::where('id',$employer_id)->first();
        // $mailData =[
        //     'employer' =>$employer,
        //     'user' => Auth::user(),
        //     'job' => $job
        // ];
        // Mail::to($employer->email)->send(new JobNotificationEmail($mailData));
        session()->flash('success','job applies successfully');

        return redirect()->back();

    }

    
}
