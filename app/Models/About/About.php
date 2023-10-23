<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class About extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'about';

    protected $fillable = [
        'image',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'content'
    ];

    public function getDiskName()
    {
        return $this->disk;
    }

    public function scopeImage(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::disk($this->disk)->url($value)
        );
    }
}
