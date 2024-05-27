<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class NewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
            'date' => ['required', 'date'],
            'description' => ['required', 'array'],
            'description.*' => ['required', 'string', 'max:65535'],
            'img_big_url' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'fb_link' => ['nullable', 'url'],
            'tw_link' => ['nullable', 'url'],
            'img_url' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title ' . __('validation.required'),
            'title.*.max' => 'Title must not exceed 255 characters',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
            'description.required' => 'Description is required',
            'description.*.required' => 'Each description is required',
            'description.*.max' => 'Description must not exceed 65535 characters',
            'fb_link.url' => 'Facebook Link must be a valid URL',
            'tw_link.url' => 'Twitter Link must be a valid URL',
            'email.email' => 'Email must be a valid email address',
            'img_big_url' => __('validation.image', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            'img_big_url.uploaded' => __('validation.uploaded') . ' 2 Mb',
            'img_url' => __('validation.image', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            'img_url.uploaded' => __('validation.uploaded') . ' 2 Mb',
        ];
    }
}

