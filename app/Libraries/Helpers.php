<?php
namespace App\Libraries;

/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 13.03.2018
 * Time: 18:49
 */
class Helpers
{

    public static function getUploadPath($resource)
    {
        $fullPath = $resource['path'] . $resource['filename'];

        return $fullPath;
    }
}