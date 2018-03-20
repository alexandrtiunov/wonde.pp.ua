<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::all();
//        $paginate = News::paginate(3);
//        dd($paginate);

        return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

//        $task = new Task();
//
//        if (Gate::denies('add', $task)) {
//
//            return redirect()->back()->with(['message' => 'У Вас нет прав']);
//        }
        return view('news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $news = $this->validate(request(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'short_discription' => 'required',
            'category_id' => 'required',
        ]);
        $news ['user_id'] = Auth::user()->id;

        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $news['img_path'] = News::getUniqueName($file);
            $file->move(public_path() . '/images/news-foto/', $news['img_path']);

        }
        if (News::create($news)) {
            return back()->with('success', 'News has been added');
        }
        return back()->with('error', 'News error');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();

//        dd($news);
        return view('news.edit', compact('news', 'id'), ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);

//        if (Gate::denies('update', $task)) {
//            //  echo 111; die;
//            return redirect()->back()->with(['message' => 'У Вас нет прав']);
//        }

        //echo 222; die;

        $this->validate(request(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'short_discription' => 'required',
            'category_id' => 'required',
        ]);

        $news->title = $request->get('title');
        $news->short_name = $request->get('short_name');
        $news->content = $request->get('content');
        $news->short_discription = $request->get('short_discription');
        $news->category_id = $request->get('category_id');

        $news->save();

        return redirect('admin/news')->with('success', 'News has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('admin/news')->with('success', 'News has been deleted');
    }
}
