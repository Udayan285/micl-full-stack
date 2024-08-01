<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\About;
use App\Models\Banner;
use App\Models\Ckeditor;
use App\Models\Homeabout;
use Illuminate\Http\Request;
use App\Models\Homecorporate;
use App\Models\CorporateVision;
use App\Http\Helpers\SlugBuilder;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
   // use SlugBuilder;

   //show all menu time page here starts
    function dashboard(){
        return view('backend.dashboard.dashboard');
    }

    function showHero(){
        $banners = Banner::all();
        return view('backend.hero-banner.basicform',compact('banners'));
    }

    function showCorporate(){
        $homeCorporateData = Homecorporate::all();
        $mainCorporateData = CorporateVision::all();
        return view('backend.corporate.corporateVision',compact('homeCorporateData','mainCorporateData'));
    }

    function showMainCorporate(){
        $mainCorporateData = CorporateVision::all();
        return view('backend.corporate.mainCorporate',compact('mainCorporateData'));
    }

    function showHomeAbout(){
        $homeabouts = Homeabout::all();
        return view('backend.about.homeAbout',compact('homeabouts'));
    }

    function showAbout(){
        $abouts = About::all();
        return view('backend.about.mainAbout',compact('abouts'));
    }

    function showArea(){
        $areas = Area::all();
        return view('backend.area.area',compact('areas'));
        
    }
    //ends here all menu items page show..



    
    //Hero Banner detail store/update/delete here..
    function heroStore(Request $request){

        $request->validate([
            "banner_title" => "required",
            "banner_description" => "required",
            "banner_image" => "required|mimes:png,jpg,jpeg,svg"
        ]);

        $banner = new Banner();
        $banner->title = $request->banner_title;
        $banner->description = $request->banner_description;


        
        //Checking old slug exists or not
        $oldSlug = Banner::where('slug','LIKE','%'.str($request->banner_title)->slug().'%')->count();
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->banner_title)->slug().'-'.$oldSlug;
            $banner->slug = $slug;
        }else{
            $slug = str($request->banner_title)->slug();
            $banner->slug = $slug;
        }
        //$slug = $this->slugGenerator($request,Banner::class);
        //$banner->slug = $slug;

        //image upload related task written here...
        $imgName = time().'.'.$request->banner_image->extension();
        $request->banner_image->move(public_path('images'), $imgName);
        $banner->image_url = $imgName;


        $banner->save();

        return redirect()->back()->with('status','Banner information added successfully.');
    }

    //Remove Banner
    function removeHero(string $slug){
        $banner = Banner::where('slug',$slug)->first();
        
        //remove from public folder
        $imgName = $banner->image_url;
        $delete = public_path('images/'.$imgName);
        if(file_exists($delete)){
            unlink($delete);
        }

        $banner->delete();
        return redirect()->back()->with('status',"Selected banner deleted successfully.");
    }

    //Edit banner
    function editHero(string $slug){
        $bannerEdit = Banner::where('slug',$slug)->first();
        return view('backend.hero-banner.editForm',compact('bannerEdit'));
    }

    function updateHero(Request $request, $slug){
        $request->validate([
            "banner_title" => "required",
            "banner_description" => "required",
            "banner_image" => "required|mimes:png,jpg,jpeg,svg"
        ]);

        $bannerUpdate = Banner::where('slug',$slug)->first();
        $bannerUpdate->title = $request->banner_title;
        $bannerUpdate->description = $request->banner_description;
        
        //banner slug updated
        //Checking old slug exists or not
         $oldSlug = Banner::where('slug','LIKE','%'.str($request->banner_title)->slug().'%')->count();
         if($oldSlug > 0){
             $oldSlug +=1;
             $slug = str($request->banner_title)->slug().'-'.$oldSlug;
             $bannerUpdate->slug = $slug;
         }else{
             $slug = str($request->banner_title)->slug();
             $bannerUpdate->slug = $slug;
         }


        //this part is for delete file from public folder while delete from database
        $delete = public_path('images/'.$bannerUpdate->image_url);
        if(file_exists($delete)){
            unlink($delete);
        }
        
        $imageName = time().'.'.$request->banner_image->extension();
        $request->banner_image->move(public_path('images'), $imageName);
        $bannerUpdate->image_url = $imageName;
        $bannerUpdate->save();
        

        $banners = Banner::all();

        return redirect()->route('dashboard.heroBanner',compact('banners'))
        ->with('status',"Banner information updated successfully.");
        

    }

    function activeHero($slug){
        $banner = Banner::where('slug',$slug)->first();

        if($banner->status == 0 ){
            $banner->status = 1;
        }else{
            $banner->status = 0;
        }
        $banner->save();
        return redirect()->back()->with('status',"Status updated successfully.");
    }


    //Home Corporate detail store/update/delete here..
    function homeCorporateStore(Request $request){
        $request->validate([
            "home_corporate_title" => "required",
            "home_corporate_description" => "required",
            "home_corporate_image" => "required|mimes:png,jpg,jpeg,svg"
        ]);

        $homecorporate = new Homecorporate();

        $homecorporate->title = $request->home_corporate_title;
        $homecorporate->description = $request->home_corporate_description;


        
        //Checking old slug exists or not
        $oldSlug = Homecorporate::where('slug','LIKE','%'.str($request->home_corporate_title)->slug().'%')->count();
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->home_corporate_title)->slug().'-'.$oldSlug;
            $homecorporate->slug = $slug;
        }else{
            $slug = str($request->home_corporate_title)->slug();
            $homecorporate->slug = $slug;
        }
        //$slug = $this->slugGenerator($request,Banner::class);
        //$banner->slug = $slug;

        //image upload related task written here...
        $imgName = time().'.'.$request->home_corporate_image->extension();
        $request->home_corporate_image->move(public_path('homecorporate'), $imgName);
        $homecorporate->image_url = $imgName;


        $homecorporate->save();

        return redirect()->back()->with('status','Home page corporate information added successfully.');
    }

    function removeHomeCorpo($slug){
        $homecorpo = Homecorporate::where('slug',$slug)->first();
        
        //remove from public folder
        $imgName = $homecorpo->image_url;
        $delete = public_path('homecorporate/'.$imgName);
        if(file_exists($delete)){
            unlink($delete);
        }

        $homecorpo->delete();
        return redirect()->back()->with('status',"Selected homepage corporate info. deleted successfully.");
    }

    function editHomeCorpo($slug){
        $homeCorpoEdit = Homecorporate::where('slug',$slug)->first();
        return view('backend.corporate.corporateEdit',compact('homeCorpoEdit'));
    }

    function updateHomeCorpo(Request $request, $slug){

            $request->validate([
                "home_corporate_title" => "required",
                "home_corporate_description" => "required",
                "home_corporate_image" => "required|mimes:png,jpg,jpeg,svg"
            ]);
    
            $homeCorpoUpdate = Homecorporate::where('slug',$slug)->first();
            $homeCorpoUpdate->title = $request->home_corporate_title;
            $homeCorpoUpdate->description = $request->home_corporate_description;
            
            //banner slug updated
            //Checking old slug exists or not
             $oldSlug = Homecorporate::where('slug','LIKE','%'.str($request->home_corporate_title)->slug().'%')->count();
             if($oldSlug > 0){
                 $oldSlug +=1;
                 $slug = str($request->home_corporate_title)->slug().'-'.$oldSlug;
                 $homeCorpoUpdate->slug = $slug;
             }else{
                 $slug = str($request->home_corporate_title)->slug();
                 $homeCorpoUpdate->slug = $slug;
             }
    
    
            //this part is for delete file from public folder while delete from database
            $delete = public_path('homecorporate/'.$homeCorpoUpdate->image_url);
            if(file_exists($delete)){
                unlink($delete);
            }
            
            $imageName = time().'.'.$request->home_corporate_image->extension();
            $request->home_corporate_image->move(public_path('homecorporate'), $imageName);
            $homeCorpoUpdate->image_url = $imageName;
            $homeCorpoUpdate->save();
            
    
            $homecorporates = Homecorporate::all();
    
            return redirect()->route('dashboard.corporate',compact('homecorporates'))
            ->with('status',"Home corporate information updated successfully.");
    }

    function activeHomeCorpo($slug){
        $singleHomeCorporate = Homecorporate::where('slug',$slug)->first();
        
        
        if($singleHomeCorporate){
            //this logic build for another items deactive 
            $singleHomeCorporate->update(['status' => 1]);
            Homecorporate::where('slug', '!=', $slug)->update(['status' => 0]);

        }else{
            $singleHomeCorporate->update(['status' => 0]);
        }
       
        $singleHomeCorporate->save();
        return redirect()->back()->with('status',"Status updated successfully.");
    }
}
