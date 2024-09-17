<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Helpers\BusinessMediaUploadTrait;
use App\Http\Helpers\MediaDeleteTrait;
use App\Models\Bottlemaking;
use Illuminate\Http\Request;

class BottleMakingController extends Controller
{
    use MediaDeleteTrait,BusinessMediaUploadTrait;
    //Coded by #udayan285
    function storeBottle(Request $request)
    {
        $bottle = new Bottlemaking();
        $this->validationStoreUpdate($request,$bottle);
        $images = $this->uploadImages($request,'business-activities/bottle-making/');
        
        $bottle::create([
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images,
        ]);
        return back()->with(['status' => 'Bottle Making Details Added Successfully']);
    }

    function previewBottle()
    {
        $bottleAll = Bottlemaking::all();
        return view('backend.business.bottle.previewBottle',compact('bottleAll'));
    }

    function removeBottle($id)
    {
       $bottle =  Bottlemaking::findOrfail($id);
       $this->businessMediaDelete($bottle);
       $bottle->delete();
       return back()->with(['status' => 'Bottle Making Details Removed Successfully']);
    }

    function activeBottle($id)
    {
        $bottle = Bottlemaking::findOrfail($id);
        Bottlemaking::where('id', "!=" ,$id)->update(['status' => 0]);
        $bottle->update(['status' => 1]);
        return back()->with(['status' => 'Bottle Making Details Activated Successfully']);
    }

    function editBottle($id)
    {
        $bottle = Bottlemaking::findOrfail($id);
        return view('backend.business.bottle.editBottle',compact('bottle'));
    }

    function updateBottle(Request $request, $id)
    {
        $bottle = Bottlemaking::findOrfail($id);
        $this->validationStoreUpdate($request,$bottle);

        if($request->hasFile('images'))
        {
        $this->businessMediaDelete($bottle);
        $images = $this->uploadImages($request,"business-activities/bottle-making/");
        }

        if(!$request->hasFile('images') && $bottle->images){
            $images = $bottle->images;
        }
        $bottle->update([
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images,
        ]);
      
        return redirect()->route('dashboard.previewBottle')->with(['status' => 'Bottle Making Details Updated Successfully']);
    }

    
    function validationStoreUpdate($request,$model)
    {
        $request->validate([
            "plant_manufacturer" => "required",
            "country_origin" => "required",
            "prime_raw_material" =>"required",
            "product" => "required",
            "utility_requirement" => "required",
            "manpower_requirement" => "required",
            "images.*" => $model->images ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);    
    }
}
