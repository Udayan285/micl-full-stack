<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;

use App\Models\Homeabout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\SlugBuilder;

class AboutController extends Controller
{
       //use SlugBuilder;    
    
            //Home Page About detail store/update/delete here..(#udayan285#)
            function storeHomeAbout(Request $request){
                
                $request->validate([
                    "home_about_title" => "required",
                    "home_about_description" => "required",
                    "home_about_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
        
                $homeabout = new Homeabout();
        
                $homeabout->title = $request->home_about_title;
                $homeabout->description = $request->home_about_description;
        

               // $slug = $this->slugGenerator($request,$title,Homeabout::class);
                //$homeabout->slug = $slug;

                    //Checking old slug exists or not

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
                $imgName = $about->image_url;
                $delete = public_path('about-us/'.$imgName);
                if(file_exists($delete)){
                    unlink($delete);
                }
        
                $about->delete();
                return redirect()->back()->with('status',"Selected about info. deleted successfully.");
            }
        
            function editHomeAbout($slug){
                $homeAboutEdit = Homeabout::where('slug',$slug)->first();
                return view('backend.about.editHomeAbout',compact('homeAboutEdit'));
            }
        
            function updateHomeAbout(Request $request, $slug){
                // dd($request->all());
        
                    $request->validate([
                        "home_about_title" => "required",
                        "home_about_description" => "required",
                        "home_about_image" => "required|mimes:png,jpg,jpeg,svg"
                    ]);
            
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
            
            
                    //this part is for delete file from public folder while delete from database
                    $delete = public_path('about-us/'.$homeAboutUpdate->image_url);
                    if(file_exists($delete)){
                        unlink($delete);
                    }
                    
                    $imageName = time().'.'.$request->home_about_image->extension();
                    $request->home_about_image->move(public_path('about-us'), $imageName);
                    $homeAboutUpdate->image_url = $imageName;
                    $homeAboutUpdate->save();
                    
                    return redirect()->route('dashboard.homeAbout')
                    ->with('status',"About-us home page information updated successfully.");
            }
        
            function activeHomeAbout($slug){
                $singleAboutHome = Homeabout::where('slug',$slug)->first();
                
                
                if($singleAboutHome){
                    //this logic build for another items deactive 
                    $singleAboutHome->update(['status' => 1]);
                    Homeabout::where('slug', '!=', $slug)->update(['status' => 0]);
        
                }else{
                    $singleAboutHome->update(['status' => 0]);
                }
               
                $singleAboutHome->save();
                return redirect()->back()->with('status',"Status updated successfully.");
            }

          
          
            //Main about us page all function here..(#udayan285#)
            function storeAbout(Request $request){
                
                $request->validate([
                    "about_title" => "required",
                    "about_description" => "required",
                    "about_image" => "required|mimes:png,jpg,jpeg,svg"
                ]);
        
                $about = new About();
        
                $about->title = $request->about_title;
                $about->description = $request->about_description;
        

                //$slug = $this->slugGenerator($request,About::class);
                //$about->slug = $slug;

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
        
            // function removeAbout($slug){
            //     $about = Homeabout::where('slug',$slug)->first();
                
            //     //remove from public folder
            //     $imgName = $about->image_url;
            //     $delete = public_path('about-us/'.$imgName);
            //     if(file_exists($delete)){
            //         unlink($delete);
            //     }
        
            //     $about->delete();
            //     return redirect()->back()->with('status',"Selected about info. deleted successfully.");
            // }
        
            // function editAbout($slug){
            //     $homeAboutEdit = Homeabout::where('slug',$slug)->first();
            //     return view('backend.about.editHomeAbout',compact('homeAboutEdit'));
            // }
        
            // function updateAbout(Request $request, $slug){
            //     // dd($request->all());
        
            //         $request->validate([
            //             "home_about_title" => "required",
            //             "home_about_description" => "required",
            //             "home_about_image" => "required|mimes:png,jpg,jpeg,svg"
            //         ]);
            
            //         $homeAboutUpdate = Homeabout::where('slug',$slug)->first();
            //         $homeAboutUpdate->title = $request->home_about_title;
            //         $homeAboutUpdate->description = $request->home_about_description;
                    
            //         //home about slug updated
            //         //Checking old slug exists or not
            //          $oldSlug = Homeabout::where('slug','LIKE','%'.str($request->home_about_title)->slug().'%')->count();
            //          if($oldSlug > 0){
            //              $oldSlug +=1;
            //              $slug = str($request->home_about_title)->slug().'-'.$oldSlug;
            //              $homeAboutUpdate->slug = $slug;
            //          }else{
            //              $slug = str($request->home_about_title)->slug();
            //              $homeAboutUpdate->slug = $slug;
            //          }
            
            
            //         //this part is for delete file from public folder while delete from database
            //         $delete = public_path('about-us/'.$homeAboutUpdate->image_url);
            //         if(file_exists($delete)){
            //             unlink($delete);
            //         }
                    
            //         $imageName = time().'.'.$request->home_about_image->extension();
            //         $request->home_about_image->move(public_path('about-us'), $imageName);
            //         $homeAboutUpdate->image_url = $imageName;
            //         $homeAboutUpdate->save();
                    
            //         return redirect()->route('dashboard.homeAbout')
            //         ->with('status',"About-us home page information updated successfully.");
            // }
        
            // function activeAbout($slug){
            //     $singleAboutHome = Homeabout::where('slug',$slug)->first();
                
                
            //     if($singleAboutHome){
            //         //this logic build for another items deactive 
            //         $singleAboutHome->update(['status' => 1]);
            //         Homeabout::where('slug', '!=', $slug)->update(['status' => 0]);
        
            //     }else{
            //         $singleAboutHome->update(['status' => 0]);
            //     }
               
            //     $singleAboutHome->save();
            //     return redirect()->back()->with('status',"Status updated successfully.");
            // }
}
