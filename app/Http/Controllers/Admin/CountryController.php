<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Country;
use App\Models\Lang;
use App\Services\DataService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $models = Country::all();
       return view('admin.countries.index', compact('models'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();
        return view('admin.countries.create', compact('langs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $data = $request->only('title', 'code' );
        $created = Country::create($data);

        if ($created) {
            return redirect()->route('admin.countries.index')
                ->with('type', 'success')
                ->with('message', 'Country has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store country!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        if (!empty($country)) {
            $model = $country;
            $model['json_field'] = $model->getTranslations('title'); 
            $langs = Lang::all();
            return view('admin.countries.edit', compact('model', 'langs'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country)
    {
        if (!empty($country)) {
            $model = $country;
            $langs = Lang::all();

            $data = $request->only('title', 'code');

            $update = $country->update($data);

            if ($update) {
                return redirect()->route('admin.countries.index')
                    ->with('type', 'success')
                    ->with('message', 'Country has been updated.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to update country!')
                    ->withInput($data)->with(compact('model', 'langs'));
            }
        } else {
            abort(404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        if (!empty($country)) {
            $deleted = $country->delete();

            if ($deleted) {
                return redirect()->route('admin.countries.index')
                    ->with('type', 'info')
                    ->with('message', 'Country has been deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete Country!');
            }
        } else {
            abort(404);
        }
    }
}
