<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
        //Main about us page all function here..(#udayan285#)
        function storeArea(Request $request){
                
            $request->validate([
                "area_title" => "required",
                "area_description" => "required",
                "area_image" => "required|mimes:png,jpg,jpeg,svg"
            ]);
    
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
    
        function removeArea($slug){
            $area = Area::where('slug',$slug)->first();
            
            //remove from public folder
            $imgName = $area->image_url;
            $delete = public_path('area/'.$imgName);
            if(file_exists($delete)){
                unlink($delete);
            }
    
            $area->delete();
            return redirect()->back()->with('status',"Selected area info. deleted successfully.");
        }
    
        function editArea($slug){
            $areaEdit = Area::where('slug',$slug)->first();
            return view('backend.area.editArea',compact('areaEdit'));
        }
    
        function updateArea(Request $request, $slug){
    
                $request->validate([
                    "area_title" => "required",
                    "area_description" => "required",
                    "area_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
        
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
        
        
                //this part is for delete file from public folder while delete from database
                $delete = public_path('area/'.$areaUpdate->image_url);
                if(file_exists($delete)){
                    unlink($delete);
                }
                
                $imageName = time().'.'.$request->area_image->extension();
                $request->area_image->move(public_path('area'), $imageName);
                $areaUpdate->image_url = $imageName;
                $areaUpdate->save();
                
                return redirect()->route('dashboard.area')
                ->with('status',"Area information updated successfully.");
        }
    
        function activeArea($slug){
            $singleArea = Area::where('slug',$slug)->first();
            
            
            if($singleArea){
                //this logic build for another items deactive 
                $singleArea->update(['status' => 1]);
                Area::where('slug', '!=', $slug)->update(['status' => 0]);
    
            }else{
                $singleArea->update(['status' => 0]);
            }
           
            $singleArea->save();
            return redirect()->back()->with('status',"Status updated successfully.");
        }
}
