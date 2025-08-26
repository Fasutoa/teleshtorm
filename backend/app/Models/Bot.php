<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Bot",
 *     title="Bot",
 *     description="Модель бота",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Название бота"),
 *     @OA\Property(property="description", type="string", example="Описание бота"),
 *     @OA\Property(property="image", type="string", example="bot_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_bot"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Bot description in English", "fr"="Description du bot en Français"}
 *     ),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-26T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-26T12:30:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="BotInput",
 *     title="Bot Input",
 *     description="Данные для создания или обновления бота",
 *     @OA\Property(property="name", type="string", example="Название бота"),
 *     @OA\Property(property="description", type="string", example="Описание бота"),
 *     @OA\Property(property="image", type="string", example="bot_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_bot"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Bot description in English", "fr"="Description du bot en Français"}
 *     ),
 *     required={"name"}
 * )
 */

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
