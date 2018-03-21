<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Resource;
use Illuminate\Http\Request;
use App\News;
use phpDocumentor\Reflection\Types\Null_;

class NewsController extends Controller
{
    public function index(Request $request, $categoryShortName = NULL)
    {
        $title = 'Новости';

        if ($request->has('news-search')) {
            $search = $request->input('news-search');
            $news = News::where('content', 'like', '%' . $search . '%')->paginate(5);
        } elseif ($categoryShortName) {
            $categories = Category::where('short_name', $categoryShortName)->first();
            $catId = $categories->id;
            $news = News::where('category_id', $catId)->get();
        } else {
            $news = News::orderBy('id', 'desc')->paginate(5);
        }

        $categories = Category::all();

        return view('news', ['news' => $news, 'categories' => $categories, 'title' => $title]);
    }


    public function detail($category_short_name, $news_short_name)
    {
        $news = News::where('short_name', $news_short_name)->first();
        $news_id = $news->id;

        $title = $news->title;

        $comments = Comment::where('news_id', $news_id)->get();

        $resources = Resource::where('news_id', $news_id)->get();

        return view('detail', compact('detail', 'short_name'), ['news' => $news, 'comments' => $comments,
            'title' => $title, 'resources' => $resources]);
    }

}
