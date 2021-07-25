<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{url?}', function (Request $request, $url = null) {
    $user = $request->user();

    return view('home', compact('user'));
})->middleware(['auth'])->where(['url' => 'schedule|schedule/tweets']);

require __DIR__.'/auth.php';
