<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
protected $fillable = [
    'name', 'email', 'subjects', 'message', 'news_id'
];

    public function news() {
        return $this->belongsTo('App\News');
    }
}
