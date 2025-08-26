<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use Illuminate\Http\Request;

class BotController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/bots",
     *     tags={"Bots"},
     *     summary="Получить список всех ботов",
     *     description="Возвращает список всех ботов с их параметрами",
     *     @OA\Response(
     *         response=200,
     *         description="Список ботов успешно получен",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Bot")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Боты не найдены",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Bots not found")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $bots = Bot::all();

        if ($bots->isEmpty()) {
            return response()->json(['error' => 'Bots not found'], 404);
        }

        return response()->json($bots);
    }

    /**
     * @OA\Get(
     *     path="api/bots/{id}",
     *     tags={"Bots"},
     *     summary="Получить бота по ID",
     *     description="Возвращает информацию о боте по его ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID бота",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Бот успешно найден",
     *         @OA\JsonContent(ref="#/components/schemas/Bot")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Бот не найден",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Bot not found")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $bot = Bot::find($id);

        if (!$bot) {
            return response()->json(['error' => 'Bot not found'], 404);
        }

        return response()->json($bot);
    }
}

