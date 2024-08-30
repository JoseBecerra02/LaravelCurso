<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\BdController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AccesoContoller;
use App\Http\Controllers\ProtegidaController;

Route::get('/', [HomeController::class, 'home_inicio'])->name('home_inicio');



Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesor.index');
Route::get('/profesores/create', [ProfesorController::class, 'create'])->name('profesor.create');
Route::post('/profesores', [ProfesorController::class, 'store'])->name('profesor.store');
Route::get('/profesores/{id}', [ProfesorController::class, 'show'])->name('profesor.show');
Route::get('/profesores/{id}/edit', [ProfesorController::class, 'edit'])->name('profesor.edit');
Route::post('/profesores-update/{id}', [ProfesorController::class, 'update'])->name('profesor.update');
Route::post('/profesores/{id}', [ProfesorController::class, 'destroy'])->name('profesor.destroy');

Route::get('/clase', [ClaseController::class, 'index'])->name('clase.index');
Route::get('/clase/create', [ClaseController::class, 'create'])->name('clase.create');
Route::post('/clase', [ClaseController::class, 'store'])->name('clase.store');
Route::get('/clase/{id}', [ClaseController::class, 'show'])->name('clase.show');
Route::get('/clase/{id}/edit', [ClaseController::class, 'edit'])->name('clase.edit');
Route::post('/clase-update/{id}', [ClaseController::class, 'update'])->name('clase.update');
Route::post('/clase/{id}', [ClaseController::class, 'destroy'])->name('clase.destroy');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/estudiantes/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('/estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::post('/estudiantes-update/{id}', [EstudianteController::class, 'update'])->name('estudiante.update');
Route::post('/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');


Route::get('/bd', [BdController::class, 'bd_inicio'])->name('bd_inicio');

Route::get('/acceso/login', [AccesoContoller::class, 'acceso_login'])->name('acceso_login');
Route::post('/acceso/login', [AccesoContoller::class, 'acceso_login_post'])->name('acceso_login_post');
Route::get('/acceso/logout', [AccesoContoller::class, 'acceso_logout'])->name('acceso_logout');
Route::get('/acceso/registro', [AccesoContoller::class, 'acceso_registro'])->name('acceso_registro');
Route::post('/acceso/registro', [AccesoContoller::class, 'acceso_registro_post'])->name('acceso_registro_post');

Route::get('/protegida', [ProtegidaController::class, 'protegida_inicio'])->name('protegida_inicio');
Route::get('/protegida/otra', [ProtegidaController::class, 'protegida_otra'])->name('protegida_otra');
Route::get('/protegida/sin-acceso', [ProtegidaController::class, 'protegida_sin_acceso'])->name('protegida_sin_acceso');