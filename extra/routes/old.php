<?php

use App\Http\Controllers\Api\TramiteController;
use App\Http\Controllers\Api\TipoController;
//use App\Http\Controllers\Api\DependenciaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DependenciaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para Tramites
Route::get('/tramites', [TramiteController::class, 'list'])->name('tramites.list');
Route::get('/Tramites/{id}', [TramiteController::class, 'item']);
Route::post('/Tramites/create', [TramiteController::class, 'create']);
Route::post('/Tramites/update', [TramiteController::class, 'update']);
Route::delete('/Tramites/{id}', [TramiteController::class, 'delete']);

// Rutas para Tipos
Route::get('/Tipos', [TipoController::class, 'List']);
Route::get('/Tipos/{id}', [TipoController::class, 'item']);
Route::post('/Tipos/create', [TipoController::class, 'create']);
Route::post('/Tipos/update', [TipoController::class, 'update']);
Route::delete('/Tipos/{id}', [TipoController::class, 'delete']);

// Rutas para Dependencias
Route::get('/p/Dependencias', [DependenciaController::class, 'list']);
Route::get('/Dependencias/{id}', [DependenciaController::class, 'item']);
Route::post('/Dependencias/create', [DependenciaController::class, 'create']);
Route::post('/Dependencias/update', [DependenciaController::class, 'update']);
Route::delete('/Dependencias/{id}', [DependenciaController::class, 'delete']);



Route::post('/login',[AuthController::class,'login']);
Route::post('/login/{id}',[AuthController::class,'login']);

