<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Project extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'projects';

    protected $fillable = [
        'image',
        'status',
    ];

    public $translatedAttributes = [
        'title',
        'content',
    ];

    public function getDiskName()
    {
        return $this->disk;
    }
}
