<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GalleryItem extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'img_url',
        'gallery_category_id',
    ];

}
