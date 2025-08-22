<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelCategory extends Model
{
    use HasFactory;

    protected $table = 'channels_categories';

    protected $fillable = [
        'name',
        'translit_name',
        'translates',
    ];

    protected $casts = [
        'translates' => 'array',
    ];

    public $timestamps = false;

    public function channels()
    {
        return $this->hasMany(Channel::class, 'category_id');
    }

    public function addRequests()
    {
        return $this->hasMany(AddRequest::class, 'category_id');
    }
}
