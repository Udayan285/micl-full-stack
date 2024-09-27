<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CorporateVision;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;


class CorporateVisionController extends Controller
{
    use MediaDeleteTrait,BusinessMediaUploadTrait;
        //Coded by udayan285#..
        function corporateStore(Request $request)
        {
            $corporate = new CorporateVision();
            $this->validations($request,$corporate);
            $corporate->title = $request->corporate_title;
            $corporate->description = $request->corporate_description;
            //Checking old slug exists or not
            $oldSlug = CorporateVision::where('slug','LIKE','%'.str($request->corporate_title)->slug().'%')->count();
            if($oldSlug > 0){
                $oldSlug +=1;
                $slug = str($request->corporate_title)->slug().'-'.$oldSlug;
                $corporate->slug = $slug;
            }else{
                $slug = str($request->corporate_title)->slug();
                $corporate->slug = $slug;
            }
            //image upload related task written here...
            $imagesAll=$this->uploadImages($request,'corporates/');
            $corporate->image_url = $imagesAll;
    
            $corporate->save();
    
            return redirect()->back()->with('status','Corporate information added successfully.');
        }
    
        function removeCorpo($slug)
        {
            $corporate = CorporateVision::where('slug',$slug)->first();
            //remove from public folder
            $this->MediaDelete($corporate);
    
            $corporate->delete();
            return redirect()->back()->with('status',"Selected corporate info. deleted successfully.");
        }
    
        function editCorpo($slug)
        {
            $CorpoEdit = CorporateVision::where('slug',$slug)->first();
            return view('backend.corporate.editMainCorporate',compact('CorpoEdit'));
        }
    
        function updateCorpo(Request $request, $slug)
        { 
                $corpoUpdate = CorporateVision::where('slug',$slug)->first();
                $this->validations($request,$corpoUpdate);
                $corpoUpdate->title = $request->corporate_title;
                $corpoUpdate->description = $request->corporate_description;
                
                //Checking old slug exists or not
                 $oldSlug = CorporateVision::where('slug','LIKE','%'.str($request->corporate_title)->slug().'%')->count();
                 if($oldSlug > 0){
                     $oldSlug +=1;
                     $slug = str($request->corporate_title)->slug().'-'.$oldSlug;
                     $corpoUpdate->slug = $slug;
                 }else{
                     $slug = str($request->corporate_title)->slug();
                     $corpoUpdate->slug = $slug;
                 }
        
        
                if($request->hasFile('images')){
                $this->MediaDelete($corpoUpdate);
                //image upload related task written here...
                $imagesAll=$this->uploadImages($request,'corporates/');
                $corpoUpdate->image_url = $imagesAll;

                }

                if(!$request->hasFile('images') && $corpoUpdate->image_url){
                    $corpoUpdate->image_url = $corpoUpdate->image_url;
                }

                $corpoUpdate->save();
                
        
                return redirect()->route('dashboard.mainCorporate')
                ->with('status',"Corporate information updated successfully.");
        }
    
        function activeCorpo($slug)
        {
            $singleCorporate = CorporateVision::where('slug',$slug)->first();
            
            
            if($singleCorporate){
                //this logic build for another items deactive 
                $singleCorporate->update(['status' => 1]);
                CorporateVision::where('slug', '!=', $slug)->update(['status' => 0]);
    
            }else{
                $singleCorporate->update(['status' => 0]);
            }
           
            $singleCorporate->save();
            return redirect()->back()->with('status',"Status updated successfully.");
        }

        function validations($request,$model)
        {
            $request->validate([
                "corporate_title" => "required",
                "corporate_description" => "required",
                "images*" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
              
            ]);
        }
}
