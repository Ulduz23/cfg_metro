<?php

namespace App\Models\Quality;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Quality extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    private $disk = 'quality';

    protected $fillable = [
        'icon'
    ];

    public $translatedAttributes = [
        'description',
    ];

    public function getDiskName()
    {
        return $this->disk;
    }

    public function icon(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::disk($this->disk)->url($value)
        );
    }
}
