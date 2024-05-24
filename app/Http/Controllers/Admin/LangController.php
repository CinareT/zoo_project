<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LangRequest;
use App\Models\Lang;

class LangController extends Controller
{
    public function index()
    {
        $models = Lang::all();
        return view('admin.langs.index', compact('models'));
    }

    public function create()
    {
        return view('admin.langs.create');
    }

    public function store(LangRequest $request)
    {
        $data = $request->only('country', 'code', 'image');

        $created = Lang::create($data);

        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = 'langs_' . $created->code . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/langs', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }

            return redirect()->route('admin.langs.index')
                ->with('type', 'success')
                ->with('message', 'Language has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store language!');
        }
    }

    public function show(Lang $lang)
    {
        if (!empty($lang)) {
            $model = $lang;
            return view('admin.langs.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(Lang $lang)
    {
        if (!empty($lang)) {
            $model = $lang;
            return view('admin.langs.edit', compact('model'));
        } else {
            abort(404);
        }
    }

    public function update(LangRequest $request, Lang $lang)
    {
        if (!empty($lang)) {
            $model = $lang;

            $data = $request->only('country', 'code', 'image');
            $image = $model->image;
            $update = $lang->update($data);
            if ($update) {
                if ($request->file()) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'langs_' . $model->code . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/langs', $imgName, 'public');
                    $model->image = '/storage/' . $imgPath;
                    $model->save();
                }
                return redirect()->route('admin.langs.index')
                    ->with('type', 'success')
                    ->with('message', 'Language has been updated.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to update language!')
                    ->withInput($data)->with(compact('model'));
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Lang $lang)
    {
        $model = $lang;
        if (!empty($model)) {

            if ($model->image && file_exists(public_path($model->image))) {
                unlink(public_path($model->image));
            }
            $deleted = $model->delete();

            if ($deleted) {
                return redirect()->route('admin.langs.index')
                    ->with('type', 'info')
                    ->with('message', 'Language has been deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete language!');
            }
        } else {
            abort(404);
        }
    }
}
