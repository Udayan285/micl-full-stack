<?php
namespace App\Http\Controllers\Helpers;

use GuzzleHttp\Psr7\Request;

trait SlugBuilder{
    //Making tarit here
    function slugGenerator($request,$model)
    {
        $oldSlug = $model::where('slug','LIKE','%'.str($request->title)->slug().'%')->count();

        //Checking old slug exists or not
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->title)->slug().'-'.$oldSlug;
        }else{
            $slug = str($request->title)->slug();
        }

        return $slug;
    }

     //Checking old slug exists or not
    //  function FunctionName()  {
    //     $oldSlug = Banner::where('slug','LIKE','%'.str($request->banner_title)->slug().'%')->count();
    //     if($oldSlug > 0){
    //         $oldSlug +=1;
    //         $slug = str($request->banner_title)->slug().'-'.$oldSlug;
    //         $banner->slug = $slug;
    //     }else{
    //         $slug = str($request->banner_title)->slug();
    //         $banner->slug = $slug;
    //     }
    //  }
    
}

?>