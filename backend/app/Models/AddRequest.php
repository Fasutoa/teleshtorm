<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddRequest extends Model
{
    use HasFactory;

    protected $table = 'add_requests';

    protected $fillable = [
        'name',
        'description',
        'image',
        'link_tg',
        'category_id',
        'second_category',
        'subscribers',
    ];

    protected $casts = [
        'subscribers' => 'integer',
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(ChannelCategory::class, 'category_id');
    }
}
