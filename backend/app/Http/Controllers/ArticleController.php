<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/articles",
     *     tags={"Articles"},
     *     summary="Получить список всех статей",
     *     description="Возвращает список всех статей с их параметрами",
     *     @OA\Response(
     *         response=200,
     *         description="Список статей успешно получен",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Article")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Статьи не найдены",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Chats not found")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $articles = Article::all();
        if ($articles->isEmpty()) {
            return response()->json(['error' => 'Chats not found'], 404);
        }
        return response()->json($articles);
    }

    /**
     * @OA\Get(
     *     path="api/articles/{id}",
     *     tags={"Articles"},
     *     summary="Получить статью по ID",
     *     description="Возвращает информацию о статье по её ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID статьи",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Статья успешно найдена",
     *         @OA\JsonContent(ref="#/components/schemas/Article")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Статья не найдена",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Channel not found")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Channel not found'], 404);
        }

        return response()->json($article);
    }
}

