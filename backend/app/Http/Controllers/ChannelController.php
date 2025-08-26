<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/",
     *     tags={"Channels"},
     *     summary="Получить список всех каналов",
     *     description="Возвращает список всех Telegram-каналов с их параметрами",
     *     @OA\Response(
     *         response=200,
     *         description="Список каналов успешно получен",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Channel")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Каналы не найдены",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Channels not found")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $channels = Channel::all();
        if ($channels->isEmpty()) {
            return response()->json(['error' => 'Channels not found'], 404);
        }
        return response()->json($channels);
    }

    /**
     * @OA\Get(
     *     path="api/channels/{id}",
     *     tags={"Channels"},
     *     summary="Получить канал по ID",
     *     description="Возвращает информацию о Telegram-канале по его ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID канала",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Канал успешно найден",
     *         @OA\JsonContent(ref="#/components/schemas/Channel")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Канал не найден",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Channel not found")
     *         )
     *     )
     * )
     */

    public function show($id)
    {
        $channel = Channel::find($id);

        if (!$channel) {
            return response()->json(['error' => 'Channel not found'], 404);
        }

        return response()->json($channel);
    }
}
