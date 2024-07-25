<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CorporateVision;


class CorporateVisionController extends Controller
{
        //Corporate detail store/update/delete here..
        function corporateStore(Request $request){
            $request->validate([
                "corporate_title" => "required",
                "corporate_description" => "required",
                "corporate_image" => "required|mimes:png,jpg,jpeg,svg"
            ]);
    
            $corporate = new CorporateVision();
    
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
            //$slug = $this->slugGenerator($request,Banner::class);
            //$banner->slug = $slug;
    
            //image upload related task written here...
            $imgName = time().'.'.$request->corporate_image->extension();
            $request->corporate_image->move(public_path('corporates'), $imgName);
            $corporate->image_url = $imgName;
    
    
            $corporate->save();
    
            return redirect()->back()->with('status','Corporate information added successfully.');
        }
    
        function removeCorpo($slug){
            $corporate = CorporateVision::where('slug',$slug)->first();
            
            //remove from public folder
            $imgName = $corporate->image_url;
            $delete = public_path('corporates/'.$imgName);
            if(file_exists($delete)){
                unlink($delete);
            }
    
            $corporate->delete();
            return redirect()->back()->with('status',"Selected corporate info. deleted successfully.");
        }
    
        function editCorpo($slug){
            $CorpoEdit = CorporateVision::where('slug',$slug)->first();
            return view('backend.corporate.editMainCorporate',compact('CorpoEdit'));
        }
    
        function updateCorpo(Request $request, $slug){
            // dd($request->all());
    
                $request->validate([
                    "corporate_title" => "required",
                    "corporate_description" => "required",
                    "corporate_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
        
                $corpoUpdate = CorporateVision::where('slug',$slug)->first();
                $corpoUpdate->title = $request->corporate_title;
                $corpoUpdate->description = $request->corporate_description;
                
                //corporate slug updated
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
        
        
                //this part is for delete file from public folder while delete from database
                $delete = public_path('corporates/'.$corpoUpdate->image_url);
                if(file_exists($delete)){
                    unlink($delete);
                }
                
                $imageName = time().'.'.$request->corporate_image->extension();
                $request->corporate_image->move(public_path('corporates'), $imageName);
                $corpoUpdate->image_url = $imageName;
                $corpoUpdate->save();
                
        
                //$allCorporates = CorporateVision::all();
        
                return redirect()->route('dashboard.mainCorporate')
                ->with('status',"Corporate information updated successfully.");
        }
    
        function activeCorpo($slug){
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
}
