<?php

namespace App\View\Components;

use App\Models\Lang;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdminNav extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $langs = Lang::all();
        $currentLang = Lang::where('code', LaravelLocalization::getCurrentLocale())->first();

        return view('components.admin-nav', compact('langs', 'currentLang'));
    }
}
