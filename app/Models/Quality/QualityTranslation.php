<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Model;

class QualityTranslation extends Model
{
    public $fillable = [
        'description'
    ];

    public $timestamps = false;
}