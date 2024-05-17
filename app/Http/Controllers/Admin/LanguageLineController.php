<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LanguageLine::where('is_deleted', 0)->get();
        if( !empty($data)){
            return view('admin.language_line.index', compact('data'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();
        return view('admin.language_line.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
