<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUploader extends Model
{
    public static function UploadImage($name, $image)
    {
        $extension = $image->getClientOriginalExtension();
        $filenametostore = substr(md5($name), 23) . '_' . time();
        $image->storeAs('public/assets/cv/' ,$filenametostore . '.' . $extension   );
        return '/storage/assets/cv/'  . $filenametostore . '.' . $extension;
    }
}
