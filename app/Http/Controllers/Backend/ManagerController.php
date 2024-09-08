<?php

namespace App\Http\Controllers\Backend;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;

class ManagerController extends Controller
{
    use MediaDeleteTrait,BusinessMediaUploadTrait;
    //Managing Director page all function here..(#udayan285#)
                
    function storeMD(Request $request)
    {

        $this->validations($request);
        $image = $this->generalMediaUpload($request,"md-profile/");
        $manager = new Manager();
        $manager->name = $request->name;
        $manager->description = $request->description;
        $manager->image_url = $image;
        $manager->save();
        return redirect()->back()->with('status', 'Manager information added successfully.');
    }

    function removeMD($id)
    {
        $md = Manager::findOrfail($id);
        $this->updateDeleteMedia($md);
        $md->delete();
        return redirect()->back()->with('status',"Selected MD info. deleted successfully.");
    }
            
    function editMD($id)
    {
        $mdEdit = Manager::where('id',$id)->first();
        return view('backend.md.editMd',compact('mdEdit'));
    }
        
    function updateMD(Request $request, $id) 
    {
        
        $this->validations($request);
        $mdUpdate = Manager::findOrfail($id);
        $this->updateDeleteMedia($mdUpdate);
        $image = $this->generalMediaUpload($request,"md-profile/");
        $mdUpdate->name = $request->name;
        $mdUpdate->description = $request->description;
        $mdUpdate->image_url = $image;
        $mdUpdate->save();
    
        return redirect()->route('dashboard.mdPage')
            ->with('status', "MD information updated successfully.");
    }

    function activeMD($id) 
    {
        $manager = Manager::findOrFail($id);
        Manager::where('id', '!=', $id)->update(['status' => 0]);
        $manager->update(['status' => 1]);
        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function validations($request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
            'image' => 'required|mimes:png,jpg,jpeg',
        ]); 
    }
}
