<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\GoodsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('articles', ArticleController::class);
Route::resource('file', FileController::class);
Route::resource('comments', CommentController::class);
Route::resource('goods', GoodsController::class);
