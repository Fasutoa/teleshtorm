<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="ArticleCategory",
 *     title="ArticleCategory",
 *     description="Модель категории статьи",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Новости"),
 *     @OA\Property(property="translit_name", type="string", example="novosti"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="News", "fr"="Nouvelles"}
 *     ),
 *     @OA\Property(
 *         property="articles",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Article")
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ArticleCategoryInput",
 *     title="ArticleCategory Input",
 *     description="Данные для создания или обновления категории статьи",
 *     @OA\Property(property="name", type="string", example="Новости"),
 *     @OA\Property(property="translit_name", type="string", example="novosti"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="News", "fr"="Nouvelles"}
 *     ),
 *     required={"name"}
 * )
 */

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
