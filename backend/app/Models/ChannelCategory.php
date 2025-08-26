<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="ChannelCategory",
 *     title="ChannelCategory",
 *     description="Модель категории канала",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Технологии"),
 *     @OA\Property(property="translit_name", type="string", example="technologii"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Technology", "fr"="Technologie"}
 *     ),
 *     @OA\Property(
 *         property="channels",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Channel")
 *     ),
 *     @OA\Property(
 *         property="addRequests",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/AddRequest")
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ChannelCategoryInput",
 *     title="ChannelCategory Input",
 *     description="Данные для создания или обновления категории канала",
 *     @OA\Property(property="name", type="string", example="Технологии"),
 *     @OA\Property(property="translit_name", type="string", example="technologii"),
 *     @OA\Property(
 *         property="translates",
 *         type="array",
 *         @OA\Items(type="string"),
 *         example={"en"="Technology", "fr"="Technologie"}
 *     ),
 *     required={"name"}
 * )
 */

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
