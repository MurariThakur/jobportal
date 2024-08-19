<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index(){
        return view('admin.login');
    }
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $credentials = $request->only('email', 'password');

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if the logged-in user is an admin
        if ($user->role == 'admin') {
            session()->flash('success', 'Welcome to Dashboard');
            return response()->json(['redirect_url' => route('dashboard')]);
        } else {
            // Logout the non-admin user
            Auth::logout();
            return response()->json(['error' => 'Only admin can access.'], 401);
        }
    } else {
        return response()->json(['error' => 'Invalid email or password.'], 401);
    }
}

    
    
}
