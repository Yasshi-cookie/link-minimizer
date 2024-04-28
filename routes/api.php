<?php

use App\Http\Controllers\RedirectToOriginalUrlController;
use App\Http\Controllers\UrlMinimizeController;
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

// ログインに関わるAPIは、それ単体ではCSRFの関係で叩けない？

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * URL短縮
 */
Route::post('/minimize', [UrlMinimizeController::class, 'minimize']);

/**
 * リダイレクトAPI
 */
Route::get('/go/{minimized_url}', [RedirectToOriginalUrlController::class, 'redirect']);
