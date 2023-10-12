<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    public $fillable = [
    	'title',
        'description',
        'content'
    ];

    public $timestamps = false;
}