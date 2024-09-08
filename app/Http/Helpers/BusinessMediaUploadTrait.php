<?php

namespace App\Http\Helpers;

trait BusinessMediaUploadTrait
{
    function uploadImages($request,$folder)
    {
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

    function generalMediaUpload($request,$folder)
    {       
        $imgName = time().'.'.$request->image->extension();
        $upload_path = $folder;
        $image_url = $upload_path.$imgName;
        $request->image->move(public_path($upload_path), $imgName);
        return $image_url;
    }
}