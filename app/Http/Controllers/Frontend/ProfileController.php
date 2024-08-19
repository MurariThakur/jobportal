<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('frontend.profile.index',compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user.'id',
            'designation' =>'required',
            'mobile' => 'required',
        ]);

        if($validator->fails()){
            // return redirect()->back()->withErrors($validator)->withInput();
            return response()->json(['errors'=>$validator->errors()],422);
        }

        if($validator->passes()){

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->designation =$request->designation;
            $user->mobile = $request->mobile;

            $user->update();
            session()->flash('success', 'Profile Updated Successfully');

            return response()->json(['redirect_url'=>route('frontend.myaccount')]);

        }
    }

    public function passwordUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'old_password' =>'required|min:8',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }

        $user = Auth::user();

        if(!Hash::check($request->old_password,$user->password)){
            return response()->json(['errors' => ['old_password' => ['Old password does not match']]], 422);
        }
        if($request->old_password === $request->new_password){
            return response()->json(['errors' => ['new_password' => 'New password cannot be the same as the old password']], 422);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        session()->flash('success', 'Password Change Successfully');
        return response()->json(['redirect_url'=>route('frontend.myaccount')]);
    }

    public function updatepic(Request $request){
        // if ($request->hasFile('image')) {
        //     dd($request->file('image'));
        // }
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.required' => 'Please select an image to upload.',
            'image.mimes' => 'Please use format PNG, JPEG only , JPG,GIF.',
            'image.max' => 'The image size must be less than 2MB.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = Auth::user();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // dd($file);
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_pictures'), $filename);
    
            // Optionally, delete the old profile picture if it exists
            if ($user->profile_picture) {
                $oldFile = public_path('uploads/profile_pictures/' . $user->image);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
    
            // Update the user's profile picture in the database
            $user->image = $filename;
            $user->save();
            
            session()->flash('success','Profile Image Updated Successfully');
            return response()->json(['success' => 'Profile picture updated successfully.', 'image_url' => asset('uploads/profile_pictures/' . $filename)]);
        }
    
        return response()->json(['error' => 'Image upload failed. Please try again.'], 500);
    }
    
}
