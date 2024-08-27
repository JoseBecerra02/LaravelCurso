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

Route::get('/', [HomeController::class, 'home_inicio'])->name('home_inicio');
Route::get('/hola', [HomeController::class, 'home_hola'])->name('home_hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'home_parametros'])->name('home_parametros');

Route::get('/template', [TemplateController::class, 'template_inicio'])->name('template_inicio');
Route::get('/template/stack', [TemplateController::class, 'template_stack'])->name('template_stack');

Route::get('/formularios', [FormulariosController::class, 'formularios_inicio'])->name('formularios_inicio');
Route::get('/formularios/simple', [FormulariosController::class, 'formularios_simple'])->name('formularios_simple');
Route::post('/formularios/simple', [FormulariosController::class, 'formularios_simple_post'])->name('formularios_simple_post');
Route::get('/formularios/flash', [FormulariosController::class, 'formularios_flash'])->name('formularios_flash');
Route::get('/formularios/flash2', [FormulariosController::class, 'formularios_flash2'])->name('formularios_flash2');
Route::get('/formularios/flash3', [FormulariosController::class, 'formularios_flash3'])->name('formularios_flash3');
Route::get('/formularios/upload', [FormulariosController::class, 'formularios_upload'])->name('formularios_upload');
Route::post('/formularios/upload', [FormulariosController::class, 'formularios_upload_post'])->name('formularios_upload_post');

Route::get('/helper', [HelperController::class, 'helper_inicio'])->name('helper_inicio');

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