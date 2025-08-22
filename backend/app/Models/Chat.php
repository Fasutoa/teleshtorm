<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'link_tg',
        'subscribers',
        'translates'
    ];

    protected $casts = [
        'translates' => 'array'
    ];
}
