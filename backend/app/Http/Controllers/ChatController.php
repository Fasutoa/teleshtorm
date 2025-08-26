<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/chats",
     *     tags={"Chats"},
     *     summary="Получить список всех чатов",
     *     description="Возвращает список всех чатов с их параметрами",
     *     @OA\Response(
     *         response=200,
     *         description="Список чатов успешно получен",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Chat")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Чаты не найдены",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Chats not found")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $chats = Chat::all();
        if ($chats->isEmpty()) {
            return response()->json(['error' => 'Chats not found'], 404);
        }
        return response()->json($chats);
    }

    /**
     * @OA\Get(
     *     path="api/chats/{id}",
     *     tags={"Chats"},
     *     summary="Получить чат по ID",
     *     description="Возвращает информацию о чате по его ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID чата",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Чат успешно найден",
     *         @OA\JsonContent(ref="#/components/schemas/Chat")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Чат не найден",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Chat not found")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $chat = Chat::find($id);

        if (!$chat) {
            return response()->json(['error' => 'Chat not found'], 404);
        }

        return response()->json($chat);
    }
}

