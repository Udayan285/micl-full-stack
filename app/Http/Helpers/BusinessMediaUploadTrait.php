<?php

namespace App\Http\Helpers;

trait BusinessMediaUploadTrait
{
    function uploadImages($request,$folder){
        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $key => $image) {
                $imageName = $key.'-'.time().'.'.$image->getClientOriginalExtension();
                $upload_path = $folder;
                $image_url = $upload_path.$imageName;
                $image->move(public_path($upload_path), $imageName);
    
                $imageUrls[] = $image_url;
            }
        }
        $allImages = implode('|', $imageUrls);
        return $allImages;
    }
}