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

    
}

?>