<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Animal extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'name',
        'description',
        'img_url',
        'img_big_url',
        'weight',
        'nutrition',
        'continent_id',
        'category_id',
        'life_span',
        'growth_count',
        'map_url'
    ];

    protected $translatable = ['title','name', 'description', 'nutrition', 'growth_count'];

}
