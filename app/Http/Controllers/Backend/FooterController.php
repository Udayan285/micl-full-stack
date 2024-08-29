<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    //Footer controller funcationallity added here
    public function storeFooter(Request $request){

        $request->validate([
            'corporate_office' => 'required',
            'sales_office' => 'required', 
            'factory' => 'required',
        ]);

        Footer::create($request->all());

        return redirect()->back()->with('status', 'Get in touch information added successfully.');
    }

    function removeFooter($id){
        $footer = Footer::where('id',$id)->first();
        $footer->delete();
        return redirect()->back()->with('status', 'Get in touch information removed successfully.');
    }

    // problem occure here
    function activeFooter($id){ 
       
        $footer = Footer::findOrFail($id);
    
        // Deactivate other footer
        Footer::where('id', '!=', $id)->update(['status' => 0]);
    
        // Activate the current footer
        $footer->update(['status' => 1]);

        return redirect()->back()->with('status', 'Status updated successfully.');
    

    }

    function editFooter($id){
        $footer = Footer::where('id',$id)->first();
        return view('backend.footer.editFooter',compact('footer'));
    }

    function updateFooter(Request $request , $id){
        $request->validate([
            'corporate_office' => 'required',
            'sales_office' => 'required', 
            'factory' => 'required',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($request->all());
    
        return redirect()->route('dashboard.footer')
            ->with('status', "Get in touch information updated successfully.");
    }
}
