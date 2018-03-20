<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\News;

class IndexController extends Controller
{
    public function index()
    {

        $news = News::orderBy('id', 'desc')->paginate(8);

        $comments = Comment::all();

        return view('index', ['news' => $news, 'comments' => $comments]);
    }


}
