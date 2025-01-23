<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;

class ImgStoreManager
{
    public static function deleteImg($imgPath){
        if(File::exists($imgPath)){
            if(!str_contains($imgPath, "no-cover.webp")){
                File::delete($imgPath);
            }
        }
    }
}
