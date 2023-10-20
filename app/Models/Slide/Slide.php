<?php

namespace App\Models\Slide;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slide extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'image',
        'disk'
    ];

    public $translatedAttributes = [
        'title'
    ];
}
