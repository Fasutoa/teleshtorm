<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'link_tg',
        'translates'
    ];

    protected $casts = [
        'translates' => 'array'
    ];
}
