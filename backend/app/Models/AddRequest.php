<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="AddRequest",
 *     title="AddRequest",
 *     description="Модель запроса на добавление канала",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Название запроса"),
 *     @OA\Property(property="description", type="string", example="Описание запроса"),
 *     @OA\Property(property="image", type="string", example="request_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_request"),
 *     @OA\Property(property="category_id", type="integer", example=3),
 *     @OA\Property(
 *         property="category",
 *         ref="#/components/schemas/ChannelCategory"
 *     ),
 *     @OA\Property(property="second_category", type="string", example="Доп. категория"),
 *     @OA\Property(property="subscribers", type="integer", example=500)
 * )
 *
 * @OA\Schema(
 *     schema="AddRequestInput",
 *     title="AddRequest Input",
 *     description="Данные для создания или обновления запроса на добавление канала",
 *     @OA\Property(property="name", type="string", example="Название запроса"),
 *     @OA\Property(property="description", type="string", example="Описание запроса"),
 *     @OA\Property(property="image", type="string", example="request_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_request"),
 *     @OA\Property(property="category_id", type="integer", example=3),
 *     @OA\Property(property="second_category", type="string", example="Доп. категория"),
 *     @OA\Property(property="subscribers", type="integer", example=500),
 *     required={"name", "category_id"}
 * )
 */

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
