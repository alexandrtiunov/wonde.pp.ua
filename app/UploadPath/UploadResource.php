<?php

namespace App\UploadPath;

use App\Http\Controllers\PortfolioController;
use App\News;
use App\Resource;
use Illuminate\Http\Request;

class UploadResource
{
    public static function pathToUpload(Request $request)
    {

        $file = $request->file('path');
        $mimeType = $file->getMimeType();
        $user_email = ($request->email);

        if ($mimeType == 'image/jpeg') {
            return $pathToUpload = '/upload/' . $user_email . '/images/';
        } else {
            return 'error.';
        }
    }

}