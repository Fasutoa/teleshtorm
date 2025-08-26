<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="Chat",
 *     title="Chat",
 *     description="Модель чата",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Название чата"),
 *     @OA\Property(property="description", type="string", example="Описание чата"),
 *     @OA\Property(property="image", type="string", example="chat_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_chat"),
 *     @OA\Property(property="subscribers", type="integer", example=1234),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Chat description in English", "fr"="Description du chat en Français"}
 *     ),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-26T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-26T12:30:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="ChatInput",
 *     title="Chat Input",
 *     description="Данные для создания или обновления чата",
 *     @OA\Property(property="name", type="string", example="Название чата"),
 *     @OA\Property(property="description", type="string", example="Описание чата"),
 *     @OA\Property(property="image", type="string", example="chat_image.jpg"),
 *     @OA\Property(property="link_tg", type="string", example="https://t.me/example_chat"),
 *     @OA\Property(property="subscribers", type="integer", example=1234),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Chat description in English", "fr"="Description du chat en Français"}
 *     ),
 *     required={"name"}
 * )
 */

class Chat extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'link_tg',
        'subscribers',
        'translates'
    ];

    protected $casts = [
        'translates' => 'array'
    ];
}
