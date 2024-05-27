<?php

namespace App\Http\Requests\Admin;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class CountryRequest extends FormRequest
{

    
    public function rules(): array
    {
        $modelId = $this->route('country')?->id;
        return [
            'title' => ['required', 'array'],
           
        ];
    }
}
