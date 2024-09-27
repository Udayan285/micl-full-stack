<?php

namespace App\Http\Controllers\Backend\Business;

use App\Models\Bitumenplant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;

class BitumenPlantController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
   
    function storeBitumen(Request $request)
    {
        $bitumen = new Bitumenplant();
        $this->storeOrUpdate($request,$bitumen);
        $bitumen->prime_raw_material = $request->prime_raw_material;
        $bitumen->product = $request->product;
        $bitumen->present_status = $request->present_status;    
    
        // Images management
        $imagesAll=$this->uploadImages($request,'business-activities/bitumen-plant/');
        $bitumen->images = $imagesAll;
        $bitumen->save();
    
        return redirect()->back()->with('status', "Bitument Plant Submitted Successfully.");
    }

    function previewBitumen()
    {
        $bitumenAll = Bitumenplant::all();
        return view('backend.business.bitumen.previewBitumen', compact('bitumenAll'));
    }

    function removeBitumen($id)
    {
        $bitumen = Bitumenplant::find($id);
        $this->businessMediaDelete($bitumen);
        $bitumen->delete();
        return redirect()->back()->with('status', "Bitument Plant Deleted Successfully.");
    }

    function activeBitumen($id)
    {
        $bitumen = Bitumenplant::findOrFail($id);
        // Deactivate other bitumen
        Bitumenplant::where('id', '!=', $id)->update(['status' => 0]);
        // Activate the current bitumen
        $bitumen->update(['status' => 1]);
        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function editBitumen($id){
        $bitumenEdit = Bitumenplant::where('id',$id)->first();
        return view('backend.business.bitumen.editBitumen',compact('bitumenEdit'));
    }

    function updateBitumen(Request $request,$id){
        $bitumen = Bitumenplant::findOrFail($id);
        $this->storeOrUpdate($request,$bitumen);
        $bitumen->prime_raw_material = $request->prime_raw_material;
        $bitumen->product = $request->product;
        $bitumen->present_status = $request->present_status;    
    
        if($request->hasFile('images'))
        {
        $this->businessMediaDelete($bitumen);
        $allImages = $this->uploadImages($request,'business-activities/bitumen-plant/');
        $bitumen->images = $allImages;
        }

        if(!$request->hasFile('images') && $bitumen->images){
            $bitumen->images = $bitumen->images;
        }
        
        $bitumen->save();
        return redirect()->route('dashboard.previewBitumen')
            ->with('status', "Information updated successfully.");
    }

    function storeOrUpdate($request,$model)
    {
        $request->validate([
            "prime_raw_material" => 'required',
            "product" => 'required',
            "present_status" => 'required',
            "images.*" => $model->images ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);
    }
}
