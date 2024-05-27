<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ticket extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'description',
        'price'
    ];

    protected $translatable = ['description'];
}
