<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Suggestion extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'email',
        'suggestion_type',
        'phone',
        'subject',
        'message'
    ];

    protected $translatable = ['name','email', 'suggestion_type','subject', 'message'];
}
