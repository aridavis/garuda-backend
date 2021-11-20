<?php

namespace App\Http\Controllers;

use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class CloudinaryController extends Controller
{
    public function upload($file, $folder){
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env("CLOUDINARY_CLOUD_NAME"),
                'api_key' => env("CLOUDINARY_API_KEY"),
                'api_secret' => env("CLOUDINARY_API_SECRET")
            ],
            'url' => [
                'secure' => true
            ]
        ]);
        $im = $cloudinary->uploadApi()->upload($file->getRealPath(), array("folder" => "/hackathon" . $folder));
        return $im;
    }
}
