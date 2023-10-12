<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class ContactTranslation extends Model
{
    public $fillable = [
    	'address',
    ];

    public $timestamps = false;
}