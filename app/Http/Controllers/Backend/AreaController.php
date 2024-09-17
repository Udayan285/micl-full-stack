<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    use MediaDeleteTrait;
        //Area page all function here..(#udayan285#)
        function storeArea(Request $request)
        {
            $area = new Area();
            $this->validations($request,$area);

            $area->title = $request->area_title;
            $area->description = $request->area_description;
            $oldSlug = Area::where('slug','LIKE','%'.str($request->area_title)->slug().'%')->count();
            if($oldSlug > 0){
                $oldSlug +=1;
                $slug = str($request->area_title)->slug().'-'.$oldSlug;
                $area->slug = $slug;
            }else{
                $slug = str($request->area_title)->slug();
                $area->slug = $slug;
            }
            //image upload related task written here...
            $imgName = time().'.'.$request->area_image->extension();
            $request->area_image->move(public_path('area'), $imgName);
            $area->image_url = $imgName;
            $area->save();
            return redirect()->back()->with('status','Area information added successfully.');
        }
    
        function removeArea($slug)
        {
            $area = Area::where('slug',$slug)->first();
            //remove from public folder
            $this->deleteMedia($area,'area/');
            $area->delete();
            return redirect()->back()->with('status',"Selected area info. deleted successfully.");
        }
    
        function editArea($slug)
        {
            $areaEdit = Area::where('slug',$slug)->first();
            return view('backend.area.editArea',compact('areaEdit'));
        }
        
        function updateArea(Request $request, $slug)
        {
        
            $areaUpdate = Area::where('slug', $slug)->first();
            $this->validations($request,$areaUpdate);

            $areaUpdate->title = $request->area_title;
            $areaUpdate->description = $request->area_description;

            // Slug generation
            $oldSlug = Area::where('slug', 'LIKE', '%' . str($request->area_title)->slug() . '%')->count();
            if ($oldSlug > 0) {
                $oldSlug += 1;
                $slug = str($request->area_title)->slug() . '-' . $oldSlug;
                $areaUpdate->slug = $slug;
            } else {
                $slug = str($request->area_title)->slug();
                $areaUpdate->slug = $slug;
            }

            // Check if a new image is uploaded
            if ($request->hasFile('area_image')) {
                // Remove old image from public folder if exists
                if ($areaUpdate->image_url) {
                    $this->deleteMedia($areaUpdate, 'area/');
                }

                // Upload the new image
                $imageName = time() . '.' . $request->area_image->extension();
                $request->area_image->move(public_path('area'), $imageName);
                $areaUpdate->image_url = $imageName; // Set the new image name
            }

            // If no new image, retain the old image
            if (!$request->hasFile('area_image') && $areaUpdate->image_url) {
                // No new image, old image is retained
                $areaUpdate->image_url = $areaUpdate->image_url;
            }

            // Save the updated area data
            $areaUpdate->save();

            return redirect()->route('dashboard.area')
                ->with('status', "Area information updated successfully.");
        }

    
        function activeArea($slug)
        {
            $singleArea = Area::where('slug',$slug)->first();
            
            
            if($singleArea){
                //this logic build for another items deactive 
                $singleArea->update(['status' => 1]);
                Area::where('slug', '!=', $slug)->update(['status' => 0]);
    
            }else{
                $singleArea->update(['status' => 0]);
            }

            $singleArea = Area::where('slug', $slug)->first();

            // if ($singleArea) {
            //     // Update the current area to active
            //     $singleArea->update(['status' => 1]);
        
            //     // Update other areas to inactive using a transaction for efficiency
            //     DB::transaction(function () use ($slug) {
            //         Area::where('slug', '!=', $slug)->update(['status' => 0]);
            //     });
            // }
           
            $singleArea->save();
            return redirect()->back()->with('status',"Status updated successfully.");
        }

        function  validations($request,$model)
        {
            $request->validate([
                "area_title" => "required",
                "area_description" => "required",
                "area_image" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
            ]);
        }


}
