<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AnimalIcon extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'img_url',
    ];

    protected $translatable = ['name','img_url'];
}
