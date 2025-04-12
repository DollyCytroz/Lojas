<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrariaController;
use App\Http\Controllers\PerfumariaController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas para Livraria
Route::get('/livraria', [LivrariaController::class, 'index']);
Route::get('/livraria/{id}', [LivrariaController::class, 'show']);
Route::post('/livraria', [LivrariaController::class, 'store']);
Route::put('/livraria/{id}', [LivrariaController::class, 'update']);
Route::delete('/livraria/{id}', [LivrariaController::class, 'destroy']);

// Rotas para Perfumaria
Route::get('/perfumaria', [PerfumariaController::class, 'index']);
Route::get('/perfumaria/{id}', [PerfumariaController::class, 'show']);
Route::post('/perfumaria', [PerfumariaController::class, 'store']);
Route::put('/perfumaria/{id}', [PerfumariaController::class, 'update']);
Route::delete('/perfumaria/{id}', [PerfumariaController::class, 'destroy']); 