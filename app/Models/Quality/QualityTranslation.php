<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    public $fillable = [
        'description'
    ];

    public $timestamps = false;
}