<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AnimalCountry extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'animal_id',
        'country_id',
        
    ];

}
