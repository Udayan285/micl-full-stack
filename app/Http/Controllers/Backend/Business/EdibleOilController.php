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
        $edible = new Edibleoil();
        $this->storeOrupdate($request,$edible);
        
        $images = $this->uploadImages($request,"business-activities/edible-oil/");
        
        $edible::create([
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
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
        $edible = Edibleoil::findOrfail($id);
        $this->storeOrupdate($request,$edible);

        if($request->hasFile('images'))
        {
        $this->businessMediaDelete($edible);
        $images = $this->uploadImages($request,"business-activities/edible-oil/");
        }
        if(!$request->hasFile('images') && $edible->images)
        {
            $images = $edible->images;
        }
        
        $edible->update([
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images,
        ]);
        return redirect()->route('dashboard.previewEdible')->with(['status' => 'Edible Oil Updated Successfully']);
    }

    function storeOrupdate($request,$model){
        $request->validate([
            "plant_manufacturer" => "required",
            "country_origin" => "required",
            "prime_raw_material" => "required",
            "product" => "required",
            "utility_requirement" => "required",
            "manpower_requirement" => "required",
            "images.*" => $model->images ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);
    }
}
