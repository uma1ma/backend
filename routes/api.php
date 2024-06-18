<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; 
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
Route::group(['prefix' => 'v1'], function() {

    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('register', [AuthController::class, 'register']);
    // Route::delete('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    // Route::apiResource('items', ItemController::class);
    Route::post('updateItem/{id}', [ItemController::class, 'updateItem']);
    Route::delete('deleteItem/{id}', [ItemController::class, 'deleteItem']);
    Route::post('createItem', [ItemController::class, 'newItem']);
    Route::get('items', [ItemController::class, 'getAllItems']);
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

});

