<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class CommentController extends Controller
{
    public function index($id)
    {
        $title = 'Коментарии к новости';

        $news = News::find($id);

        $comments = Comment::where('news_id', $news->id)->get();
//        $paginate = News::paginate(3);
//        dd($comments);

        return view('news.comments', ['comments' => $comments, 'title' => $title]);
    }

    public function destroy(Request $request, $id)
    {

        $comments = Comment::find($id);
//        dd($comments);
        $comments->delete();

        return back();
    }
}
