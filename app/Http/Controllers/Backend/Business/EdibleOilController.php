<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Helpers\BusinessMediaUploadTrait;
use App\Http\Helpers\MediaDeleteTrait;
use App\Models\Edibleoil;
use Illuminate\Http\Request;

class EdibleOilController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    //coded by udayan285#
    function storeEdible(Request $request)
    {
        $this->storeOrupdate($request);
        
        $images = $this->uploadImages($request,"business-activities/edible-oil/");
        
        Edibleoil::create([
            "year_establishment" => $request->year_establishment,
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "existing_capacity" => $request->existing_capacity,
            "product" => $request->product,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images,
        ]);

        return back()->with(['status' => 'Edible Oil Added Successfully']);
    }

    function removeEdible($id)
    {
        $edible = Edibleoil::findOrfail($id);

        $this->businessMediaDelete($edible);
        $edible->delete();
        return back()->with(['status' => 'Edible Oil Removed Successfully']);
    }

    function previewEdible()
    {
        $edibleAll = Edibleoil::all();
        return view("backend.business.edible.previewEdible",compact('edibleAll'));
    }

    function activeEdible($id)
    {
        $edible = Edibleoil::findOrfail($id);
        Edibleoil::where("id","!=",$id)->update(["status"=>0]);
        $edible->update(["status"=>1]);
        return back()->with(['status' => 'Edible Oil Activated Successfully']);
    }

    function editEdible($id)
    {
        $edibleEdit = Edibleoil::findOrfail($id);
        return view("backend.business.edible.editEdible",compact('edibleEdit'));
    }

    function  updateEdible(Request $request,$id)
    {
        $this->storeOrupdate($request);
        $edible = Edibleoil::findOrfail($id);

        $this->businessMediaDelete($edible);
        $images = $this->uploadImages($request,"business-activities/edible-oil/");

        $edible->update([
            "year_establishment" => $request->year_establishment,
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "existing_capacity" => $request->existing_capacity,
            "product" => $request->product,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images,
        ]);
        return redirect()->route('dashboard.previewEdible')->with(['status' => 'Edible Oil Updated Successfully']);
    }

    function storeOrupdate($request){
        $request->validate([
            "year_establishment" => "required",
            "plant_manufacturer" => "required",
            "country_origin" => "required",
            "existing_capacity" => "required",
            "product" => "required",
            "utility_requirement" => "required",
            "manpower_requirement" => "required",
            "images.*" => "required|mimes:png,jpg,jpeg,webp"
        ]);
    }
}
