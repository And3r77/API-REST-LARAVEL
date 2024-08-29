<?php

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{id}', [NewsController::class, 'index2']);
    Route::post('/news', [NewsController::class, 'index']);
    Route::post('/news1', [NewsController::class, 'index3']);
    // Crear una noticia (asegúrate de tener el método correcto en tu controlador)
    //Route::post('/news', [NewsController::class, 'store']);
    // Actualizar una noticia específica por ID con el método PUT
    Route::post('/newsu', [NewsController::class, 'update']);
    Route::post('/newsd', [NewsController::class, 'destroy']);
});
