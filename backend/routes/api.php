<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/channels', [ChannelController::class, 'index'])->name('channels.index');
Route::get('/channels/{id}', [ChannelController::class, 'show'])->name('channels.show');

Route::get('/chats', [ChatController::class, 'index'])->name('chats.index');
Route::get('/chats/{id}', [ChatController::class, 'show'])->name('chats.show');

Route::get('/bots', [BotController::class, 'index'])->name('bots.index');
Route::get('/bots/{id}', [BotController::class, 'show'])->name('bots.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles', [ArticleController::class, 'show'])->name('articles.index');
