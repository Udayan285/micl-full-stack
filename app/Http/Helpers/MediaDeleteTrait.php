<?php

namespace App\Http\Helpers;

trait MediaDeleteTrait
{
    function deleteMedia($req,$folder){
        //this part is for delete file from public folder while delete from database
        $delete = public_path($folder.$req->image_url);
        if(file_exists($delete)){
            unlink($delete);
        }
    }

    //Update delete method
    function updateDeleteMedia($model)
    {
        if ($model->image_url) {  
                $image = $model->image_url;         
                $delete = public_path($image);
                if(file_exists($delete)){
                    unlink($delete);
                } 
            }              
    }

   
    function generalMediaDelete($model)
    {
        if ($model->image) {  
                $image = $model->image;         
                $delete = public_path($image);
                if(file_exists($delete)){
                    unlink($delete);
                } 
            }              
    }

    function businessMediaDelete($model)
    {
        if ($model->images) {           
                $images = explode('|',$model->images);
                foreach ($images as $image){
                    $delete = public_path($image);
                    if(file_exists($delete)){
                        unlink($delete);
                    } 
                }              
        }
    }

    //This delete media trais for Main About us page,Main Corporate page, Area page
    function MediaDelete($model)
    {
        if ($model->image_url) {           
                $images = explode('|',$model->image_url);
                foreach ($images as $image){
                    $delete = public_path($image);
                    if(file_exists($delete)){
                        unlink($delete);
                    } 
                }              
        }
    }
}
