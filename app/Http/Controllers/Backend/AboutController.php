<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;

use App\Models\Homeabout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\SlugBuilder;
use App\Http\Helpers\MediaDeleteTrait;

class AboutController extends Controller
{
       use MediaDeleteTrait;   
    
            //Home Page About detail store/update/delete here..(#udayan285#)
            function storeHomeAbout(Request $request){
                
                $this->validations($request);
                $homeabout = new Homeabout();
        
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
        
                    
                    $this->validations($request);
                    $homeAboutUpdate = Homeabout::where('slug',$slug)->first();
                    $homeAboutUpdate->title = $request->home_about_title;
                    $homeAboutUpdate->description = $request->home_about_description;
                    
                    //home about slug updated
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
            
            
                    //remove from public folder
                    $this->deleteMedia($homeAboutUpdate,'about-us/');
                    
                    
                    $imageName = time().'.'.$request->home_about_image->extension();
                    $request->home_about_image->move(public_path('about-us'), $imageName);
                    $homeAboutUpdate->image_url = $imageName;
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

            function validations($request)
            {
                $request->validate([
                    "home_about_title" => "required",
                    "home_about_description" => "required",
                    "home_about_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
            }

          
          
            //Main about us page all function here..(#udayan285#)
            function storeAbout(Request $request){
                
                $this->validationsAbout($request);
        
                $about = new About();
        
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
                $imgName = time().'.'.$request->about_image->extension();
                $request->about_image->move(public_path('about-us'), $imgName);
                $about->image_url = $imgName;
        
        
                $about->save();
        
                return redirect()->back()->with('status','About-us information added successfully.');
            }
        
            function removeAbout($slug){
                $about = About::where('slug',$slug)->first();
                
                //remove from public folder
                $this->deleteMedia($about,'about-us/');
        
                $about->delete();
                return redirect()->back()->with('status',"Selected about info. deleted successfully.");
            }
        
            function editAbout($slug){
                $aboutEdit = About::where('slug',$slug)->first();
                return view('backend.about.editMainAbout',compact('aboutEdit'));
            }
        
            function updateAbout(Request $request, $slug){
            
                    $this->validationsAbout($request);
                    $aboutUpdate = About::where('slug',$slug)->first();
                    $aboutUpdate->title = $request->about_title;
                    $aboutUpdate->description = $request->about_description;
                    
                    //home about slug updated
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
            
            
                    
                    //remove from public folder
                    $this->deleteMedia($aboutUpdate,'about-us/');
                    
                    $imageName = time().'.'.$request->about_image->extension();
                    $request->about_image->move(public_path('about-us'), $imageName);
                    $aboutUpdate->image_url = $imageName;
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

            function validationsAbout($request)
            {
                $request->validate([
                    "about_title" => "required",
                    "about_description" => "required",
                    "about_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
            }
}
