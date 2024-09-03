<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use App\Models\Storagetank;
use Illuminate\Http\Request;

class StorageTankController extends Controller
{
    
    function storeStorageTank(Request $request)
    {

        $request->validate([
            "year_establishment" => 'required',
            "storage_capacity" => 'required',
            "product_turnover" => 'required',
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
            "images.*" => 'required|mimes:jpg,jpeg,png,webp'
        ]);
    
        $storage = new Storagetank();
        
        $storage->year_establishment = $request->year_establishment;
        $storage->storage_capacity = $request->storage_capacity;
        $storage->product_turnover = $request->product_turnover;
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
        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $key => $image) {
                $imageName = $key.'-'.time().'.'.$image->getClientOriginalExtension();
                $upload_path = 'business-activities/';
                $image_url = $upload_path.$imageName;
                $image->move(public_path($upload_path), $imageName);
    
                $imageUrls[] = $image_url;
            }
        }
    
        $storage->images = implode('|', $imageUrls);
    
        $storage->save();
    
        return redirect()->back()->with('status', "Storage Tank Submitted Successfully.");
    }

    function previewAll()
    {
        $storagetanks = Storagetank::all();
        return view('backend.business.previewAll',compact('storagetanks'));
    }

    // function storeStorageTank(Request $request)
    // {
    //     $request->validate([
    //         "year_establishment" => 'required',
    //         "storage_capacity" => 'required',
    //         "product_turnover" => 'required',
    //         "inward_facility" => 'required',
    //         "jetty_facility" => 'required',
    //         "pipeline_facility" => 'required',
    //         "delivery_facility" => 'required',
    //         "outward_delivey" => 'required',
    //         "weight_scale" => 'required',
    //         "utility_requirement" => 'required',
    //         "manpower_requirement" => 'required',
    //         "opportunity" => 'required',
    //         "bonded_facility" => 'required',
    //         "images.*" => 'required|mimes:jpg,jpeg,png,webp'
    //     ]);

    //     // Create the StorageTank entry
    //     $storage = StorageTank::create($request->only([
    //         'year_establishment',
    //         'storage_capacity',
    //         'product_turnover',
    //         'inward_facility',
    //         'jetty_facility',
    //         'pipeline_facility',
    //         'delivery_facility',
    //         'outward_delivey',
    //         'weight_scale',
    //         'utility_requirement',
    //         'manpower_requirement',
    //         'opportunity',
    //         'bonded_facility',
    //     ]));

    //     // Images management
    //     if ($request->hasFile('images')) {
    //         foreach($request->file('images') as $image) {
    //             $imageName = uniqid().'.'.$image->getClientOriginalExtension();
    //             $uploadPath = 'business-activities/';
    //             $imagePath = $uploadPath.$imageName;
    //             $image->move(public_path($uploadPath), $imageName);

    //             // Store each image in the storage_tank_images table
    //             $storage->images()->create([
    //                 'image_path' => $imagePath
    //             ]);
    //         }
    //     }

    //     return redirect()->back()->with('status', "Storage Tank Submitted Successfully.");
    // }

    function removeStorage($id)
    {
        $storage = StorageTank::find($id);
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
        return view('backend.business.editBusinessActivities',compact('storageEdit'));
    }

    function updateStorage(Request $request,$id){
        
        $request->validate([
            "year_establishment" => 'required',
            "storage_capacity" => 'required',
            "product_turnover" => 'required',
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
            "images.*" => 'required|mimes:jpg,jpeg,png,webp'
        ]);

        $storage = StorageTank::findOrFail($id);

        $storage->year_establishment = $request->year_establishment;
        $storage->storage_capacity = $request->storage_capacity;
        $storage->product_turnover = $request->product_turnover;
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
    
        // Step 1: Retrieve existing images and split them into an array
        if ($storage->images) {
            $existingImages = explode('|', $storage->images);

            // Step 2: Delete each existing image file
            foreach ($existingImages as $image) {
                $imagePath = public_path($image); // Construct the full path to the image
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
            }
        }

        // Step 3: Upload and save the new images
        $imageUrls = [];
        if ($request->hasFile('images')) {
                foreach($request->file('images') as $key => $image) {
                    $imageName = $key.'-'.time().'.'.$image->getClientOriginalExtension();
                    $upload_path = 'business-activities/';
                    $image_url = $upload_path.$imageName;
                    $image->move(public_path($upload_path), $imageName);

                    $imageUrls[] = $image_url;
                }
        }

        // Step 4: Update the database with the new images
        $storage->images = implode('|', $imageUrls);

        $storage->save();

        
    
        return redirect()->route('dashboard.preview')
            ->with('status', "Information updated successfully.");
    }

}
