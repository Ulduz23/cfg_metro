<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Banner extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'banners';

    protected $fillable = [
        'image',
        'link',
        'status',

    ];

    protected $casts = [
        'status'
    ];

    public $translatedAttributes = [
        'title',
        'description'
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
