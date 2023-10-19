<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Gallery extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'image',
        'status'
    ];

    public $translatedAttributes = [
        'title'
    ];
}
