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

        $manager = new Manager();
        $this->validations($request,$manager);
        $image = $this->generalMediaUpload($request,"md-profile/");
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
        
        $mdUpdate = Manager::findOrfail($id);
        $this->validations($request,$mdUpdate);
        $mdUpdate->name = $request->name;
        $mdUpdate->description = $request->description;

        if($request->hasFile('image'))
        {
        $this->updateDeleteMedia($mdUpdate);
        $image = $this->generalMediaUpload($request,"md-profile/");
        $mdUpdate->image_url = $image;
        }

        if(!$request->hasFile('image') && $mdUpdate->image_url)
        {
            $mdUpdate->image_url = $mdUpdate->image_url;
        }

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

    function validations($request,$model)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
            "image" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]); 
    }
}
