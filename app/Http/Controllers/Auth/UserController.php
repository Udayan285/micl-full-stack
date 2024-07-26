<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function showRegForm(){
        return view('auth.register');
    }

    function showLogForm(){
        return view('auth.login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "first_name"=>"required|max:15",
            "last_name"=>"required|max:15",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|numeric|confirmed",
        ]);

        $newUser = new User();

        //create new user
        $newUser->first_name = $request->first_name;
        $newUser->last_name = $request->last_name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;

        //slug build here
        $oldSlug = User::where('slug','LIKE','%'.str($request->first_name)->slug().'%')->count();
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->first_name)->slug().'-'.$oldSlug;
            $newUser->slug = $slug;
        }else{
            $slug = str($request->first_name)->slug();
            $newUser->slug = $slug;
        }

        $newUser->save();

        return redirect()->route('auth.loginForm')->with('status','Registration successfully done.');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {        
       $credentials =  $request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard.all')->with('status',"Congratuons! you're logged in now.");
        }
        else{
            return redirect()->route('auth.loginForm')->with('status2','Oops! credentials does not match!');
        }
    }


   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        
        Auth::logout();

        return redirect()->route('auth.loginForm')->with('status','You are logged out now!');


    }
}
