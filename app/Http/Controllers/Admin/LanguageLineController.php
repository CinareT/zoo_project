<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        $data = LanguageLine::where('is_deleted', 0)->get();
        if (!empty($langs)) {
            return view('admin.language_line.index', compact('data', 'langs'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        $langs = Lang::all();
        return view('admin.language_line.create', compact('langs'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // $data['is_deleted'] = $request->is_deleted ? 1 : 0;
        $created = LanguageLine::create($data);

        if ($created) {
            return redirect()->route('admin.language_line.index')
                ->with('type', 'success')
                ->with('message', 'Language Line has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store language line!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LanguageLine $languageLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LanguageLine $languageLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LanguageLine $languageLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LanguageLine $languageLine)
    {
        if ($languageLine) {
            $deleted = $languageLine->delete();

            if ($deleted) {
                return redirect()->route('admin.language_line.index')
                    ->with('type', 'info')
                    ->with('message', 'Language line has been deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete language line!');
            }
        } else {
            abort(404);
        }
    }
}
