<?php

namespace App\Models\Slide;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Slide extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'slides';

    protected $fillable = [
        'image',
    ];

    public $translatedAttributes = [
        'title'
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
