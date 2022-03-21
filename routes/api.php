<?php

use App\Http\Controllers\GroceryListController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::prefix('me')->group(function () {
    Route::post('/tokens/create', [UserController::class, 'createToken']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/', [UserController::class, 'me']);
    });
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/grocery-list', [GroceryListController::class, 'index']);
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});


