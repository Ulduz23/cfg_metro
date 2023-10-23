<?php

namespace App\Models\Station;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Station extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public $translatedAttributes = [
        'name'
    ];
}
