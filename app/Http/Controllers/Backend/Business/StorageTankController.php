<?php

namespace App\Http\Controllers\Backend\Business;

use App\Models\Storagetank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;

class StorageTankController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    
    function storeStorageTank(Request $request)
    {

        $storage = new Storagetank();
        $this->validations($request,$storage);
    
        
        $storage->inward_facility = $request->inward_facility;
        $storage->jetty_facility = $request->jetty_facility;
        $storage->pipeline_facility = $request->pipeline_facility;
        $storage->delivery_facility = $request->delivery_facility;
        $storage->outward_delivey = $request->outward_delivey;
        $storage->weight_scale = $request->weight_scale;
        $storage->utility_requirement = $request->utility_requirement;
        $storage->manpower_requirement = $request->manpower_requirement;
        $storage->opportunity = $request->opportunity;
        $storage->bonded_facility = $request->bonded_facility;
    
        // Images management
        $imagesAll=$this->uploadImages($request,'business-activities/storage-tank/');
        $storage->images = $imagesAll;
        $storage->save();
    
        return redirect()->back()->with('status', "Storage Tank Submitted Successfully.");
    }

    function previewAll()
    {
        $storagetanks = Storagetank::all();
        return view('backend.business.storage-tank.previewAll',compact('storagetanks'));
    }

    function removeStorage($id)
    {
        $storage = StorageTank::find($id);
        $this->businessMediaDelete($storage);
        $storage->delete();
        return redirect()->back()->with('status',"Selected Storage info. deleted successfully.");
    }

    function activeStorage($id)
    {
        $storage = StorageTank::findOrFail($id);
    
        // Deactivate other storage
        StorageTank::where('id', '!=', $id)->update(['status' => 0]);
    
        // Activate the current storage
        $storage->update(['status' => 1]);
    
        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function editStorage($id){
        $storageEdit = StorageTank::where('id',$id)->first();
        return view('backend.business.storage-tank.editBusinessActivities',compact('storageEdit'));
    }

    function updateStorage(Request $request,$id){
        
        $storage = StorageTank::findOrFail($id);
        $this->validations($request,$storage);


        $storage->inward_facility = $request->inward_facility;
        $storage->jetty_facility = $request->jetty_facility;
        $storage->pipeline_facility = $request->pipeline_facility;
        $storage->delivery_facility = $request->delivery_facility;
        $storage->outward_delivey = $request->outward_delivey;
        $storage->weight_scale = $request->weight_scale;
        $storage->utility_requirement = $request->utility_requirement;
        $storage->manpower_requirement = $request->manpower_requirement;
        $storage->opportunity = $request->opportunity;
        $storage->bonded_facility = $request->bonded_facility;

        if($request->hasFile('images')){
        //Delete previous images first
        $this->businessMediaDelete($storage);
        //New images upload again
        $allImages = $this->uploadImages($request,'business-activities/storage-tank/');
        $storage->images = $allImages;
        }

        if(!$request->hasFile('images') && $storage->images){
            $storage->images = $storage->images;
        }

        $storage->save();

        return redirect()->route('dashboard.preview')
            ->with('status', "Information updated successfully.");
    }

    function validations($request,$model)
    {
        $request->validate([
            "inward_facility" => 'required',
            "jetty_facility" => 'required',
            "pipeline_facility" => 'required',
            "delivery_facility" => 'required',
            "outward_delivey" => 'required',
            "weight_scale" => 'required',
            "utility_requirement" => 'required',
            "manpower_requirement" => 'required',
            "opportunity" => 'required',
            "bonded_facility" => 'required',
            "images.*" => $model->images ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);
    }

}
