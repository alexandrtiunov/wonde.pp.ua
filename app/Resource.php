<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phash;

class Resource extends Model
{
    protected $fillable = ['name', 'email', 'news_id', 'path', 'filename', 'category_id', 'phash'];

    public function news()
    {
        return $this->belongsTo('App\News');
    }

    public static function pHash()
    {

        $phasher = new Phash;
        $phash = $phasher->getHash($_FILES['path']['tmp_name'], false);

        return $phash;
    }
}
