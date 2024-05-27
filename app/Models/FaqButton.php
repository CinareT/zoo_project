<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FaqButton extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'link',
    ];

    protected $translatable = ['title'];
}
