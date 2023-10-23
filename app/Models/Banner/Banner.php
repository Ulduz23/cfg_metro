<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Banner extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'image',
        'disk',
        'link',
        'status',

    ];

    public $translatedAttributes = [
        'title',
        'description'
    ];
}
