<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\createJob;
use App\Models\category;
use App\Models\jobType;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $totalUsers = User::count();
        $totalJobs = createJob::count();
        $totalCategories = category::count();
        $totalJobTypes = jobType::count();
        return view('admin.Dashboard', compact('totalUsers', 'totalJobs', 'totalCategories', 'totalJobTypes'));
    }

    public function logout(Request $request){
        Auth::logout();
        session()->flash('success','Logout Successfully');
        return redirect()->route('frontend.home');
    }

    public function user(){
        $users = User::paginate(10);
        return view('admin.users',compact('users'));
    }

    public function updateRole(Request $request, $id){
        $user = User::find($id);
        if($user){
            $user->role = $request->role;
            $user->save();
            session()->flash('success','User role updated successfully');
        }
        return redirect()->back();
    }
}