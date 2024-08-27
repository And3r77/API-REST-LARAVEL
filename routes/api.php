<?php

use App\Http\Controllers\NewsController;
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



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news', [NewsController::class, 'index']);
    Route::get('/news/{id}', [NewsController::class, 'index2']);
    Route::post('/news1', [NewsController::class, 'index3']);

    // Actualizar una noticia específica por ID con el método PUT
    Route::put('/news/{id}', [NewsController::class, 'update']);
    
    // Crear una noticia (asegúrate de tener el método correcto en tu controlador)
    Route::post('/news', [NewsController::class, 'store']);
});
