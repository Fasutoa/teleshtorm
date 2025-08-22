<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'channels';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'link_tg',
        'hidden',
        'activity',
        'subscribers',
        'created_at',
        'translates',
    ];

    protected $casts = [
        'hidden'     => 'boolean',
        'activity'   => 'boolean',
        'subscribers'=> 'integer',
        'created_at' => 'datetime',
        'translates' => 'array',
    ];

    public $timestamps = false; // в таблице только created_at

    public function category()
    {
        return $this->belongsTo(ChannelCategory::class, 'category_id');
    }
}
