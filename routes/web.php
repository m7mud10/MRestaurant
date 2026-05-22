<?php

use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('/', [RecipesController::class, 'showUser'])->name('home');
    Route::get('/auth/login', [RecipesController::class, 'login'])->name('login');
    Route::post('/login', [RecipesController::class, 'authenticate']);

// Route::resource('/dashboard/admin', RecipesController::class);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard/admin',[RecipesController::class,'index'])->name('index');
    Route::get('/dashboard/admin/create',[RecipesController::class,'create']);
    Route::post('/dashboard/admin',[RecipesController::class,'store']);
    Route::get('/dashboard/admin/{id}',[RecipesController::class,'show']);
    Route::get('/dashboard/admin/{id}/edit',[RecipesController::class,'edit']);
    Route::put('/dashboard/admin/{id}',[RecipesController::class,'update']);
    Route::delete('/dashboard/admin/{id}',[RecipesController::class,'destroy']);
    Route::post('/logout', [RecipesController::class, 'logout'])->name('logout');

});
