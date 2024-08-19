<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\jobType;
use App\Models\createJob;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function index(){
        $categories = category::where('status',1)->take(8)->get();
        $homecategories = category::where('status',1)->get();
        // dd($homecategories);
        $featurejobs =createJob::where('isFeature',1)->where('status',1)->orderBy('created_at','DESC')->take(6)->get();
        // dd($featurejobs);
        $latestjobs =createJob::where('status',1)->orderBy('created_at','DESC')->take(6)->get();
        return view('frontend.home',compact('categories','featurejobs','latestjobs','homecategories'));
    }
}
