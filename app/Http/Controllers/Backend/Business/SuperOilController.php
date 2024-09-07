<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Helpers\BusinessMediaUploadTrait;
use App\Http\Helpers\MediaDeleteTrait;
use App\Models\Superoil;
use Illuminate\Http\Request;

class SuperOilController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    //Coded by Udayan285#
    function storeSuper(Request $request)
    {
        $this->storeOrUpdate($request);
        $images = $this->uploadImages($request,"business-activities/super-oil/");

        Superoil::create([
            "year_establishment" => $request->year_establishment,
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "existing_capacity" => $request->existing_capacity,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images
        ]);

        return back()->with(['status' => 'Super Oil Added Successfully']);
    }

    function previewSuper()
    {
        $superAll = Superoil::all();
        return view('backend.business.super-oil.previewSuper',compact('superAll'));
    }

    function removeSuper($id)
    {
        $superOil = Superoil::findOrfail($id);
        $this->businessMediaDelete($superOil);
        $superOil->delete();
        return back()->with(['status' => 'Super Oil Removed Successfully']);
    }

    function activeSuper($id)
    {
       $super = Superoil::findOrfail($id);
       Superoil::where('id','!=',$id)->update(["status"=>0]);
       $super->update(["status"=>1]);
       return back()->with(['status' => 'Super Oil Activated Successfully']);
    }

    function editSuper($id)
    {
        $super = Superoil::findOrfail($id);
        return view('backend.business.super-oil.editSuper',compact('super'));
    }

    function updateSuper(Request $request, $id)
    {
        $super = Superoil::findOrfail($id);
        $this->storeOrUpdate($request);
        $this->businessMediaDelete($super);
        $images = $this->uploadImages($request,"business-activities/super-oil/");
        $super->update([
            "year_establishment" => $request->year_establishment,
            "plant_manufacturer" => $request->plant_manufacturer,
            "country_origin" => $request->country_origin,
            "prime_raw_material" => $request->prime_raw_material,
            "product" => $request->product,
            "existing_capacity" => $request->existing_capacity,
            "utility_requirement" => $request->utility_requirement,
            "manpower_requirement" => $request->manpower_requirement,
            "images" => $images
        ]);
        return redirect()->route('dashboard.previewSuper')->with(['status' => 'Super Oil Updated Successfully']);

    }

    function storeOrUpdate($request)
    {
        $request->validate([
            "year_establishment" => "required",
            "plant_manufacturer" => "required",
            "country_origin" => "required",
            "prime_raw_material" => "required",
            "product" => "required",
            "existing_capacity" => "required",
            "utility_requirement" => "required",
            "manpower_requirement" => "required",
            "images.*" => "required|mimes:jpg,jpeg,png,webp"
        ]);
    }
}
