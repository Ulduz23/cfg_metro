<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;
}
