<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Lang;
use App\Services\DataService;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct(private DataService $dataService){}
    public function index()
    {
       $models = Category::all();
       return view('admin.categories.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();
        return view('admin.categories.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only('title' );
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = Category::create($data);

        if ($created) {
            return redirect()->route('admin.categories.index')
                ->with('type', 'success')
                ->with('message', 'Category has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store category!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (!empty($category)) {
            $model = $category;
            $model['json_field'] = $model->getTranslations('title'); 
            $langs = Lang::all();
            return view('admin.categories.edit', compact('model', 'langs'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if (!empty($category)) {
            $model = $category;
            $langs = Lang::all();

            $data = $request->only('title');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');

            $update = $category->update($data);

            if ($update) {
                return redirect()->route('admin.categories.index')
                    ->with('type', 'success')
                    ->with('message', 'Category has been updated.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to update category!')
                    ->withInput($data)->with(compact('model', 'langs'));
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!empty($category)) {
            $deleted = $category->delete();

            if ($deleted) {
                return redirect()->route('admin.categories.index')
                    ->with('type', 'info')
                    ->with('message', 'Category has been deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete Category!');
            }
        } else {
            abort(404);
        }
    }
}
