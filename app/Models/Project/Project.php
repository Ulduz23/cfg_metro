<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'projects';

    protected $fillable = [
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public $translatedAttributes = [
        'title',
        'content',
    ];

    public function getDiskName()
    {
        return $this->disk;
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::disk($this->disk)->url($value)
        );
    }
}
