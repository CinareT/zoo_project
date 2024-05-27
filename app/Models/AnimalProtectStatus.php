<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AnimalProtectStatus extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'animal_id',
        'protection_id',
    ];

}
