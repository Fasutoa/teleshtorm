<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Article",
 *     title="Article",
 *     description="Модель статьи",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Название статьи"),
 *     @OA\Property(property="translit_name", type="string", example="nazvanie-stati"),
 *     @OA\Property(property="description", type="string", example="Краткое описание статьи"),
 *     @OA\Property(property="content", type="string", example="Полное содержание статьи"),
 *     @OA\Property(property="image", type="string", example="image.jpg"),
 *     @OA\Property(property="recommended", type="boolean", example=true),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Article in English", "fr"="Article en Français"}
 *     ),
 *     @OA\Property(property="telegram_post_id", type="string", example="123456789"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-26T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-26T12:30:00Z"),
 *     @OA\Property(
 *         property="category",
 *         ref="#/components/schemas/ArticleCategory"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ArticleInput",
 *     title="Article Input",
 *     description="Данные для создания или обновления статьи",
 *     @OA\Property(property="name", type="string", example="Название статьи"),
 *     @OA\Property(property="translit_name", type="string", example="nazvanie-stati"),
 *     @OA\Property(property="description", type="string", example="Краткое описание статьи"),
 *     @OA\Property(property="content", type="string", example="Полное содержание статьи"),
 *     @OA\Property(property="image", type="string", example="image.jpg"),
 *     @OA\Property(property="recommended", type="boolean", example=true),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Article in English", "fr"="Article en Français"}
 *     ),
 *     @OA\Property(property="telegram_post_id", type="string", example="123456789"),
 *     required={"name", "content", "category_id"}
 * )
 */

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
