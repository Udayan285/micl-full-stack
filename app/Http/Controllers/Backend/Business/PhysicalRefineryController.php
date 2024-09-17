<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Helpers\BusinessMediaUploadTrait;
use App\Http\Helpers\MediaDeleteTrait;
use App\Models\Physicalrefinery;
use Illuminate\Http\Request;

class PhysicalRefineryController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    //coded by udayan285#
    function storePhysical(Request $request)
    {
        $physical = new Physicalrefinery;
        
        $this->validations($request,$physical);
        $images = $this->uploadImages($request,'business-activities/physical-refinery/');

        $physical::create([
            'plant_manufacturer' => $request->plant_manufacturer,
            'country_origin' => $request->country_origin,
            'prime_raw_material' => $request->prime_raw_material,
            'product' => $request->product,
            'pack_size' => $request->pack_size,
            'utility_requirement' => $request->utility_requirement,
            'manpower_requirement' => $request->manpower_requirement,
            'present_status' => $request->present_status,
            'images' => $images,
        ]);
        return redirect()->back()->with('status', "Physical Refinery Unit Submitted Successfully.");

    }

    function previewPhysical()
    {
        $physicalAll = Physicalrefinery::all();
        return view('backend.business.physical.previewPhysical',compact('physicalAll'));
    }

    function removePhysical($id)
    {
        $physical = Physicalrefinery::find($id);
        $this->businessMediaDelete($physical);
        $physical->delete();
        return redirect()->back()->with('status', "Physical Refinery Unit Deleted Successfully.");
    }

    function activePhysical($id)
    {
        $physical = Physicalrefinery::findOrFail($id);
        // Deactivate other bitumen
        Physicalrefinery::where('id', '!=', $id)->update(['status' => 0]);
        // Activate the current bitumen
        $physical->update(['status' => 1]);
        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function editPhysical($id)
    {
        $physicalEdit = Physicalrefinery::where('id',$id)->first();
        return view('backend.business.physical.editPhysical',compact('physicalEdit'));
    }

    function updatePhysical(Request $request,$id)
    {
        
        $physical = Physicalrefinery::find($id);
        $this->validations($request, $physical);

        if($request->hasFile('images')){
        $this->businessMediaDelete($physical);
        $images = $this->uploadImages($request,'business-activities/physical-refinery/');
        }
        if(!$request->hasFile('images') && $physical->images)
        {
            $images = $physical->images;
        }
        
        $physical->update([
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "pack_size" => $request->pack_size,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "present_status" => $request->present_status,
            "images" => $images,

        ]);
        return redirect()->route('dashboard.previewPhysical')
            ->with('status', "Information updated successfully.");
        
    }

    function validations($request,$model)
    {
        $request->validate([
            "plant_manufacturer" => "required",
            "country_origin" => "required",
            "prime_raw_material" => "required",
            "product" => "required",
            "pack_size" => "required",
            "utility_requirement" => "required",
            "manpower_requirement" => "required",
            "present_status" => "required",
            "images.*" => $model->images ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);
    }
}
