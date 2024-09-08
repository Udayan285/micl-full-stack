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
                
            $this->validations($request);
    
            $area = new Area();
    
            $area->title = $request->area_title;
            $area->description = $request->area_description;
    

            //$slug = $this->slugGenerator($request,About::class);
            //$about->slug = $slug;

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
                $this->validations($request);
                $areaUpdate = Area::where('slug',$slug)->first();
                $areaUpdate->title = $request->area_title;
                $areaUpdate->description = $request->area_description;
                
                
                //Checking old slug exists or not
                 $oldSlug = Area::where('slug','LIKE','%'.str($request->area_title)->slug().'%')->count();
                 if($oldSlug > 0){
                     $oldSlug +=1;
                     $slug = str($request->area_title)->slug().'-'.$oldSlug;
                     $areaUpdate->slug = $slug;
                 }else{
                     $slug = str($request->area_title)->slug();
                     $areaUpdate->slug = $slug;
                 }
        
                //remove from public folder
                $this->deleteMedia($areaUpdate,'area/');
                
                $imageName = time().'.'.$request->area_image->extension();
                $request->area_image->move(public_path('area'), $imageName);
                $areaUpdate->image_url = $imageName;
                $areaUpdate->save();
                
                return redirect()->route('dashboard.area')
                ->with('status',"Area information updated successfully.");
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

        function  validations($request)
        {
            $request->validate([
                "area_title" => "required",
                "area_description" => "required",
                "area_image" => "required|mimes:png,jpg,jpeg,svg"
            ]);
        }


}
