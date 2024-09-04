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
        // dd($request->all());
        $request->validate([
            "storage_tank" => 'required',
            "service_tank" => 'required',
            "product_turnover" => 'required',
            "prime_raw_material" => 'required',
            "product" => 'required',
            "present_status" => 'required',
            "images.*" => 'required|mimes:jpg,jpeg,png,webp',
        ]);
    
        $bitumen = new Bitumenplant();
        $bitumen->storage_tank = $request->storage_tank;
        $bitumen->service_tank = $request->service_tank;
        $bitumen->product_turnover = $request->product_turnover;
        $bitumen->prime_raw_material = $request->prime_raw_material;
        $bitumen->product = $request->product;
        $bitumen->present_status = $request->present_status;    
    
        // Images management
        $imagesAll=$this->uploadImages($request,'business-activities/');
        // dd($imagesAll);
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
}
