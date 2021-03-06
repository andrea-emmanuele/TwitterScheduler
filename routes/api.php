<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/tweets', [\App\Http\Controllers\TweetController::class, 'index']);
Route::get('/scheduled-tweets', [\App\Http\Controllers\TweetController::class, 'indexScheduled']);
Route::get('/check-tweets', [\App\Http\Controllers\TweetController::class, 'checkLength']);

Route::post('/create-tweet', [\App\Http\Controllers\TweetController::class, 'store']);

Route::delete('/delete-scheduled', [\App\Http\Controllers\TweetController::class, 'destroy']);

