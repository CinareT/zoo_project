<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Protection extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'description',
    ];

    protected $translatable = ['description'];
}
