<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    //coded by udayan285#
    function getUserManagement()
    {
        $users = User::all();
        return view('backend.user-management.userManagement',compact('users'));
    }

    function getUserProfile()
    {
        return view("backend.user-management.userProfile");
    }

    function editUserProfile($id)
    {
        $user = User::findOrfail($id);
        return view("backend.user-management.editUserProfile",compact('user'));
    }
}
