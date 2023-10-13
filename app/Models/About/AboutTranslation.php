<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    public $fillable = [
    	'title',
        'description',
        'content'
    ];

    public $timestamps = false;
}