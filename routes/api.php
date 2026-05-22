<?php

use App\Http\Controllers\Api\FavoriteRecipeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/recipes',[FavoriteRecipeController::class,'indexAll']);

Route::get('/favorites/{device_id}',[FavoriteRecipeController::class,'index']);
Route::post('/favorites',[FavoriteRecipeController::class,'store']);
Route::delete('/favorites/{id}',[FavoriteRecipeController::class,'destroy']);

// Route::apiResource('/favorites', FavoriteRecipeController::class);