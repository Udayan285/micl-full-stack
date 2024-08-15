<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\mebemail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function sendEmail(Request $request){
     
        $request->validate([
          'name' => 'required|max:20|min:5',
          'email' => 'required|email',
          'subject' => 'required|min:5|max:20',
          'message' => 'required|min:10|max:255',
        ]);
  
        $adminMail = "odoynnath@gmail.com";
  
        $response = Mail::to($adminMail)->send(new mebemail($request->all()));
      
      
        if($response){
          return back()->with('success','Mail sent successfully');
        }else{
          return back()->with('fail','Mail not sent');
        }
      
      }
}
