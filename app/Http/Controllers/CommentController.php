<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\News;

class CommentController extends Controller
{
    public function store(Request $request ){

        $newsId = $request->get('news_id');

        $comments = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'subjects' => 'required',
            'message' => 'required',
        ]);

        $comments['news_id'] = $newsId;

        $comments = Comment::create($comments);

        return response()->json([
            'status' => true,
            'comments' => $comments
        ]);
    }
}
