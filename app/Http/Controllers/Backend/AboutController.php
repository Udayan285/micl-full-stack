<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;

use App\Models\Homeabout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Controllers\Helpers\SlugBuilder;
use App\Http\Helpers\BusinessMediaUploadTrait;

class AboutController extends Controller
{
       use MediaDeleteTrait,BusinessMediaUploadTrait;   
    
            //Home Page About detail store/update/delete here..(#udayan285#)
            function storeHomeAbout(Request $request){
                
                $homeabout = new Homeabout();
                $this->validations($request,$homeabout);
        
                $homeabout->title = $request->home_about_title;
                $homeabout->description = $request->home_about_description;

                $oldSlug = Homeabout::where('slug','LIKE','%'.str($request->home_about_title)->slug().'%')->count();
                if($oldSlug > 0){
                    $oldSlug +=1;
                    $slug = str($request->home_about_title)->slug().'-'.$oldSlug;
                    $homeabout->slug = $slug;
                }else{
                    $slug = str($request->home_about_title)->slug();
                    $homeabout->slug = $slug;
                }
             
        
                //image upload related task written here...
                $imgName = time().'.'.$request->home_about_image->extension();
                $request->home_about_image->move(public_path('about-us'), $imgName);
                $homeabout->image_url = $imgName;
        
        
                $homeabout->save();
        
                return redirect()->back()->with('status','Home Page about-us information added successfully.');
            }
        
            function removeHomeAbout($slug){
                $about = Homeabout::where('slug',$slug)->first();
                
                //remove from public folder
                $this->deleteMedia($about,'about-us/');
                
                $about->delete();
                return redirect()->back()->with('status',"Selected about info. deleted successfully.");
            }
        
            function editHomeAbout($slug){
                $homeAboutEdit = Homeabout::where('slug',$slug)->first();
                return view('backend.about.editHomeAbout',compact('homeAboutEdit'));
            }
        
            function updateHomeAbout(Request $request, $slug)
            {
        
                    $homeAboutUpdate = Homeabout::where('slug',$slug)->first();
                    $this->validations($request,$homeAboutUpdate);
                    $homeAboutUpdate->title = $request->home_about_title;
                    $homeAboutUpdate->description = $request->home_about_description;
                    
                    //Checking old slug exists or not
                     $oldSlug = Homeabout::where('slug','LIKE','%'.str($request->home_about_title)->slug().'%')->count();
                     if($oldSlug > 0){
                         $oldSlug +=1;
                         $slug = str($request->home_about_title)->slug().'-'.$oldSlug;
                         $homeAboutUpdate->slug = $slug;
                     }else{
                         $slug = str($request->home_about_title)->slug();
                         $homeAboutUpdate->slug = $slug;
                     }
            
                    if($request->hasFile('home_about_image')){
                    $this->deleteMedia($homeAboutUpdate,'about-us/');
                    $imageName = time().'.'.$request->home_about_image->extension();
                    $request->home_about_image->move(public_path('about-us'), $imageName);
                    $homeAboutUpdate->image_url = $imageName;
                    }

                    if(!$request->hasFile('home_about_image') && $homeAboutUpdate->image_url){
                        $homeAboutUpdate->image_url = $homeAboutUpdate->image_url;
                    }

                    $homeAboutUpdate->save();
                    
                    return redirect()->route('dashboard.homeAbout')
                    ->with('status',"About-us home page information updated successfully.");
            }
        
            function activeHomeAbout($slug){
                //udayan285
                $singleAboutHome = Homeabout::where('slug',$slug)->first();
                if($singleAboutHome){
                    //others item deactive 
                    $singleAboutHome->update(['status' => 1]);
                    Homeabout::where('slug', '!=', $slug)->update(['status' => 0]);
        
                }else{
                    $singleAboutHome->update(['status' => 0]);
                }
               
                $singleAboutHome->save();
                return redirect()->back()->with('status',"Status updated successfully.");
            }

            function validations($request,$model)
            {
                $request->validate([
                    "home_about_title" => "required",
                    "home_about_description" => "required",
                    "home_about_image" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg"
                ]);
            }

          
          
            //Main about us page all function here..(#udayan285#)
            function storeAbout(Request $request){
                
                $about = new About();
                $this->validationsAbout($request,$about);
                $about->title = $request->about_title;
                $about->description = $request->about_description;
        

                $oldSlug = About::where('slug','LIKE','%'.str($request->about_title)->slug().'%')->count();
                if($oldSlug > 0){
                    $oldSlug +=1;
                    $slug = str($request->about_title)->slug().'-'.$oldSlug;
                    $about->slug = $slug;
                }else{
                    $slug = str($request->about_title)->slug();
                    $about->slug = $slug;
                }
        
                //image upload related task written here...
                $imagesAll=$this->uploadImages($request,'about-us/');
                $about->image_url = $imagesAll;
        
        
                $about->save();
        
                return redirect()->back()->with('status','About-us information added successfully.');
            }
        
            function removeAbout($slug){
                $about = About::where('slug',$slug)->first();
                
                //remove from public folder
                $this->MediaDelete($about);
        
                $about->delete();
                return redirect()->back()->with('status',"Selected about info. deleted successfully.");
            }
        
            function editAbout($slug){
                $aboutEdit = About::where('slug',$slug)->first();
                return view('backend.about.editMainAbout',compact('aboutEdit'));
            }
        
            function updateAbout(Request $request, $slug){
            
                    $aboutUpdate = About::where('slug',$slug)->first();
                    $this->validationsAbout($request,$aboutUpdate);
                    $aboutUpdate->title = $request->about_title;
                    $aboutUpdate->description = $request->about_description;
                    
                    //Checking old slug exists or not
                     $oldSlug = About::where('slug','LIKE','%'.str($request->about_title)->slug().'%')->count();
                     if($oldSlug > 0){
                         $oldSlug +=1;
                         $slug = str($request->about_title)->slug().'-'.$oldSlug;
                         $aboutUpdate->slug = $slug;
                     }else{
                         $slug = str($request->about_title)->slug();
                         $aboutUpdate->slug = $slug;
                     }
            
            
                    if($request->hasFile('images')){
                    $this->MediaDelete($aboutUpdate);
                    //image upload related task written here...
                    $imagesAll=$this->uploadImages($request,'about-us/');
                    $aboutUpdate->image_url = $imagesAll;

                    }

                    if(!$request->hasFile('images') && $aboutUpdate->image_url){
                        $aboutUpdate->image_url = $aboutUpdate->image_url;
                    }

                    $aboutUpdate->save();
                    
                    return redirect()->route('dashboard.actualAbout')
                    ->with('status',"About-us information updated successfully.");
            }
        
            function activeAbout($slug){
                $singleAbout = About::where('slug',$slug)->first();
                
                
                if($singleAbout){
                    //this logic build for another items deactive 
                    $singleAbout->update(['status' => 1]);
                    About::where('slug', '!=', $slug)->update(['status' => 0]);
        
                }else{
                    $singleAbout->update(['status' => 0]);
                }
               
                $singleAbout->save();
                return redirect()->back()->with('status',"Status updated successfully.");
            }

            function validationsAbout($request,$model)
            {
                $request->validate([
                    "about_title" => "required",
                    "about_description" => "required",
                    "images*" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
                ]);
            }
}