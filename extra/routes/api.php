<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TramiteController;
use App\Http\Controllers\Api\TipoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DependenciaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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
Route::get('/Dependencias', [DependenciaController::class, 'list']);
Route::get('/Dependencias/{id}', [DependenciaController::class, 'item']);
Route::post('/Dependencias/create', [DependenciaController::class, 'create']);
Route::post('/Dependencias/update', [DependenciaController::class, 'update']);
Route::delete('/Dependencias/{id}', [DependenciaController::class, 'delete']);

// API de User
Route::get('/users',[UserController::class,'list']);
Route::get('/users/{id}',[UserController::class,'item']);
Route::post('/users/create',[UserController::class,'create']);
Route::post('/users/update',[UserController::class,'update']);
Route::delete('/users/{id}',[UserController::class,'delete']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/login/{id}',[AuthController::class,'login']);