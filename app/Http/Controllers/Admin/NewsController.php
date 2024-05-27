<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Lang;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
       $models = News::all();
       return view('admin.news.index', compact('models'));
    }

    public function create()
    {
        $langs = Lang::all();
        return view('admin.news.create', compact('langs'));
    }

    public function store(NewsRequest $request)
    {
        $data = $request->only('title', 'date', 'description', 'img_big_url', 'fb_link', 'tw_link', 'email', 'img_url');
        dd($data);
        // Veritabanına kaydetmek
        $created = News::create($data);

        if ($created) {
            return redirect()->route('admin.news.index')
                ->with('type', 'success')
                ->with('message', 'News has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store news!');
        }
    }

    public function edit(News $news)
    {
        if (!empty($news)) {
            $langs = Lang::all();
            return view('admin.news.edit', compact('news', 'langs'));
        } else {
            abort(404);
        }
    }

    public function update(NewsRequest $request, News $news)
    {
        if (!empty($news)) {
            $data = $request->only('title', 'date', 'description', 'img_big_url', 'fb_link', 'tw_link', 'email', 'img_url');
            
            $update = $news->update($data);

            if ($update) {
                return redirect()->route('admin.news.index')
                    ->with('type', 'success')
                    ->with('message', 'News has been updated.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to update news!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(News $news)
    {
        if (!empty($news)) {
            $deleted = $news->delete();

            if ($deleted) {
                return redirect()->route('admin.news.index')
                    ->with('type', 'info')
                    ->with('message', 'News has been deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete News!');
            }
        } else {
            abort(404);
        }
    }
}
