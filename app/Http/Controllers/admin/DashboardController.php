<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.Dashboard');
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
}
