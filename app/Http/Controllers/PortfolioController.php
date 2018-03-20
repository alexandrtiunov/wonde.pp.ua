<?php

namespace App\Http\Controllers;

use App\Libraries\Helpers;
use App\Resource;
use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Phash;
use App\UploadPath\UploadResource;

class PortfolioController extends Controller
{
    public function index()
    {

        $title = 'Галерея|Добавь свое фото';

        $categories = Category::all();

        $news = News::all();

        return view('portfolio.portfolio', ['categories' => $categories, 'news' => $news, 'title' => $title]);
    }

    public function store(Request $request)
    {
        $resource = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'category_id' => 'required',
            'path' => 'required',
            'news_id' => 'required',
        ]);
        $resource['phash'] = Resource::pHash();

        $resources = Resource::all();

        $phasher = new Phash;

        foreach ($resources as $item) {
            $fullPath = Helpers::getUploadPath($item);

            $hamming = $phasher->getSimilarity(unserialize($item['phash']), $resource['phash']);
            if ($hamming > Phash::MAX_HAMMING_VALUE) {
                return back()->with(['error' => 'Загруженная картинка, с вероятностью' . $hamming . ' % уже имеется в базе',
                    'fullPath' => $fullPath]);
            }
        }

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $resource['path'] = UploadResource::pathToUpload($request);
            $resource['filename'] = News::getUniqueName($file);
            $path = $resource['path'];
            $filename = $resource['filename'];
            $file->move(public_path() . $path, $filename);
        }

        $resource['phash'] = serialize($resource['phash']);

        if (Resource::create($resource)) {
            return back()->with('success', 'Спасибо, Ваша картинка добавлена');
        }

        return back()->with('error', 'error');
    }

    public function detail($short_name)
    {

        $categories = Category::where('short_name', $short_name)->first();
        $catId = $categories->id;

        $title = 'Фото|' . $categories->title;

        $images = Resource::where('category_id', $catId)->get();

        return view('portfolio.detail', ['categories' => $categories, 'images' => $images, 'title' => $title]);
    }
}
