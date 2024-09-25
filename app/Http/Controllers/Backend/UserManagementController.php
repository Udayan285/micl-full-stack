<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;

class UserManagementController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    //coded by udayan285#
    function getUserManagement()
    {
        $users = User::all();
        return view('backend.user-management.userManagement',compact('users'));
    }

    function removeUser($slug)
    {
        $user = User::where('slug',$slug)->first();
        $this->updateDeleteMedia($user);
        $user->delete();
        return redirect()->route('dashboard.getUserManagement')->with('success','User has been deleted successfully');
    }


    //single profile
    function getUserProfile()
    {
        return view("backend.user-management.userProfile");
    }


    function updateUserProfile(Request $request,$id)
    {
        $user = User::findOrfail($id);

        $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required|email|unique:users,email,'.$user->id,
            "contact" => 'required|numeric',
            "image" => 'required|mimes:jpg,jpeg,png'
        ]);

        $this->updateDeleteMedia($user);
        $image = $this->generalMediaUpload($request,"user-profile/");
        
        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "contact" => $request->contact,
            "image_url" => $image
        ]);

        return redirect()->route('dashboard.getUserProfile')->with(['status' => "Profile updated successfully."]);

    
    }

    function UpdatePassword(Request $request,$id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            "current_password" => "required|current_password:web",
            "new_password" => "required|different:current_password|confirmed",
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('dashboard.getUserProfile')->with(['status' => "Password updated successfully."]);
    }
}
