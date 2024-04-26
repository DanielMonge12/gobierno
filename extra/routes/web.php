<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Database\Schema\IndexDefinition;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\UserController;



Route::get('/', [HomeController::class, 'landing'])->name('main');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para Tramites
Route::get('/tramites', [TramiteController::class, 'index'])->name('tramites.index');
Route::get('/tramites/crear', [TramiteController::class, 'TramitesCrear'])->name('tramites.Crear');
Route::post('/tramites/crear', [TramiteController::class, 'TramitesCreate'])->name('tramites.Create');
Route::get('/tramites/editar/{id}', [TramiteController::class, 'TramitesEditar'])->name('tramites.Editar');
Route::put('/tramites/editar/{id}', [TramiteController::class, 'TramitesEdit'])->name('tramites.Edit');
Route::delete('/tramites/eliminar/{id}', [TramiteController::class, 'TramitesDelete'])->name('tramites.Delete');


// Rutas para Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/crear', [UserController::class, 'UserCrear'])->name('users.Crear');
Route::post('/usuarios/crear', [UserController::class, 'UserCreate'])->name('users.Create');
Route::get('/usuarios/editar/{id}', [UserController::class, 'UserEditar'])->name('users.Editar');
Route::put('/usuarios/editar/{id}', [UserController::class, 'UserEdit'])->name('users.Edit');
Route::delete('/usuarios/eliminar/{id}', [UserController::class, 'UserDelete'])->name('users.Delete');


// Rutas para Tipos
Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');
Route::get('/tipos/crear', [TipoController::class, 'TiposCrear'])->name('tipos.Crear');
Route::post('/tipos/crear', [TipoController::class, 'TiposCreate'])->name('tipos.Create');
Route::get('/tipos/editar/{id}', [TipoController::class, 'TiposEditar'])->name('tipos.Editar');
Route::put('/tipos/editar/{id}', [TipoController::class, 'TiposEdit'])->name('tipos.Edit');
Route::delete('/tipos/eliminar/{id}', [TipoController::class, 'TiposDelete'])->name('tipos.Delete');
// Rutas para Dependencias
Route::get('/dependencias', [DependenciaController::class, 'index'])->name('dependencias.index');
Route::get('/dependencias/crear', [DependenciaController::class, 'DependenciasCrear'])->name('dependencias.Crear');
Route::post('/dependencias/crear', [DependenciaController::class, 'DependenciasCreate'])->name('dependencias.Create');
Route::get('/dependencias/editar/{id}', [DependenciaController::class, 'DependenciasEditar'])->name('dependencias.Editar');
Route::put('/dependencias/editar/{id}', [DependenciaController::class, 'DependenciasEdit'])->name('dependencias.Edit');
Route::delete('/dependencias/eliminar/{id}', [DependenciaController::class, 'DependenciasDelete'])->name('dependencias.Delete');
Route::get('/dependencias/{id}/detalles', [DependenciaController::class, 'Detalles'])->name('dependencias.Detalles');






//rutas de users
Route::get('/perfil',[PerfilController::class,'index'])->name('perfil');
Route::get('/perfil/editar/{id}',[PerfilController::class, 'PerfilEditar'])->name('PerfilEditar');
Route::post('/perfil/editar/{id}',[PerfilController::class, 'ProfileEdit'])->name('ProfileEdit');
Route::delete('/perfil/eliminar/{id}',[PerfilController::class, 'ProfileDelete'])->name('ProfileDelete');



Auth::routes();
Auth::routes();
Route::get('/dashboard', function () {
    return view('admin.home');
})->name('admin.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
