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

Route::prefix('grocery-list')->group(function() {
    Route::middleware('auth:sanctum')->group(function() {
        Route::put('/{id}', [GroceryListController::class, 'update']);
        Route::post('/', [GroceryListController::class, 'store']);
        Route::delete('/{id}', [GroceryListController::class, 'destroy']);

        // Items
        Route::post('/{id}/item', [GroceryListController::class, 'createItem']);
        Route::put('/{id}/item/{item_id}', [GroceryListController::class, 'updateItem']);
        Route::delete('/{id}/item/{item_id}', [GroceryListController::class, 'deleteItem']);
    });

    Route::get('/', [GroceryListController::class, 'index']);
    Route::get('/{id}', [GroceryListController::class, 'show']);
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});


