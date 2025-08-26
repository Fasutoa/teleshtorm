<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Channel",
 *     title="Channel",
 *     description="Модель канала",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Название канала"),
 *     @OA\Property(property="description", type="string", example="Описание канала"),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(
 *         property="category",
 *         ref="#/components/schemas/ChannelCategory"
 *     ),
 *     @OA\Property(property="image", type="string", example="channel_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_channel"),
 *     @OA\Property(property="hidden", type="boolean", example=false),
 *     @OA\Property(property="activity", type="boolean", example=true),
 *     @OA\Property(property="subscribers", type="integer", example=1500),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-26T12:00:00Z"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Channel description in English", "fr"="Description du channel en Français"}
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ChannelInput",
 *     title="Channel Input",
 *     description="Данные для создания или обновления канала",
 *     @OA\Property(property="name", type="string", example="Название канала"),
 *     @OA\Property(property="description", type="string", example="Описание канала"),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(property="image", type="string", example="channel_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_channel"),
 *     @OA\Property(property="hidden", type="boolean", example=false),
 *     @OA\Property(property="activity", type="boolean", example=true),
 *     @OA\Property(property="subscribers", type="integer", example=1500),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Channel description in English", "fr"="Description du channel en Français"}
 *     ),
 *     required={"name", "category_id"}
 * )
 */

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
