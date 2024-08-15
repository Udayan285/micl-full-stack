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
}
