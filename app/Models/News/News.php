<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class News extends Model implements TranslatableContract
{
    use Translatable;

    private $disk = 'news';

    public $translatedAttributes = [
        'title',
        'description',
        'content'
    ];

    protected $fillable = [
        'image',
        'online'
    ];

    protected $casts = [
        'online' => 'boolean'
    ];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::disk($this->disk)->url($value)
        );
    }

    public function getDiskName()
    {
        return $this->disk;
    }
}
