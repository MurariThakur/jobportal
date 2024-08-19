<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('frontend.auth.login');
    }

    public function logininto(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => "required|email",
            "password" => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['errors' =>$validator->errors()],422);
        }
         
        $credentials= $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->flash('success', 'You have successfully logged in.');
            $request->session()->flash('success',' Login Successfully');
            return response()->json(['redirect_url' => route('frontend.home')]);
        }
        else{
            return response()->json(['error' => 'Invalid email or password.'], 401);
        }
    }

    public function register(){
        return view('frontend.auth.register');
    }

    public function registeration(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'User registered successfully');
    
        return response()->json(['redirect_url' => route('frontend.login')], 201);
    }

    public function logout(Request $request){

        Auth::logout();
        return redirect()->route('frontend.home')->with('success', 'You have successfully logged out.');
    }
}
