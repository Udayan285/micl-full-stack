<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;

class FooterController extends Controller
{
    use MediaDeleteTrait;
    //coded by here #udayan285..
    public function storeFooter(Request $request)
    {
        $this->validations($request);
        Footer::create($request->all());
        return redirect()->back()->with('status', 'Get in touch information added successfully.');
    }

    function removeFooter($id)
    {
        $footer = Footer::findOrfail($id);
        $footer->delete();
        return redirect()->back()->with('status', 'Get in touch information removed successfully.');
    }
    
    function activeFooter($id)
    { 

        $footer = Footer::findOrFail($id);
        Footer::where('id', '!=', $id)->update(['status' => 0]);
        $footer->update(['status' => 1]);

        return redirect()->back()->with('status', 'Status updated successfully.');
    

    }

    function editFooter($id)
    {
        $footer = Footer::where('id',$id)->first();
        return view('backend.footer.editFooter',compact('footer'));
    }

    function updateFooter(Request $request,$id)
    {
        
        $this->validations($request);
        $footer = Footer::findOrFail($id);
        $footer->update($request->all());
    
        return redirect()->route('dashboard.footer')
            ->with('status', "Get in touch information updated successfully.");
    }

    function validations($request)
    {
        $request->validate([
            'corporate_office' => 'required',
            'sales_office' => 'required', 
            'factory' => 'required',
        ]);
    }
}
