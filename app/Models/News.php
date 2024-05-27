<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'date',
        'description',
        'img_big_url',
        'fb_link',
        'tw_link',
        'email',
        'img_url'

    ];

    

    protected $translatable = ['title','description'];
}
