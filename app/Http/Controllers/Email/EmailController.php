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
          'subject' => 'required|min:5|max:30',
          'message' => 'required|max:255',
        ]);
  
        $adminMail = "udayannath31@gmail.com";
  
        // $response = Mail::to($adminMail)->send(new mebemail($request->all()));
      
      
        // if($response){
        //   return back()->with('success','Mail sent successfully');
        // }else{
        //   return back()->with('fail','Mail not sent');
        // }


        try {
          Mail::to($adminMail)->send(new mebemail($request->all()));
          return back()->with('success', 'Mail sent successfully');
      } catch (\Exception $e) {
          return back()->with('fail', 'Mail not sent. Error: ' . $e->getMessage());
      }
      
      }
}
