<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
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

    public $translatedAttributes = [
        'title',
        'description'
    ];

    public function getDiskName()
    {
        return $this->disk;
    }
}
