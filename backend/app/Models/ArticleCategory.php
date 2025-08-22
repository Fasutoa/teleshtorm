<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'articles_categories';

    protected $fillable = [
        'name',
        'translit_name',
        'translates',
    ];

    protected $casts = [
        'translates' => 'array',
    ];

    public $timestamps = false; // так как в таблице нет created_at / updated_at

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
