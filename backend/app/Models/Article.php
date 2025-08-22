<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'name',
        'translit_name',
        'description',
        'content',
        'image',
        'recommended',
        'category_id',
        'translates',
        'telegram_post_id',
    ];

    protected $casts = [
        'recommended' => 'boolean',
        'translates'  => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
