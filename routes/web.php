<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\BdController;


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

Route::get('/bd', [BdController::class, 'bd_inicio'])->name('bd_inicio');
Route::get('/bd/profesores', [BdController::class, 'bd_profesores'])->name('bd_profesores');
Route::get('/bd/profesores/add', [BdController::class, 'bd_profesores_add'])->name('bd_profesores_add');
Route::post('/bd/profesores/add', [BdController::class, 'bd_profesores_add_post'])->name('bd_profesores_add_post');
Route::get('/bd/profesores/edit/{id}', [BdController::class, 'bd_profesores_edit'])->name('bd_profesores_edit');
Route::post('/bd/profesores/edit/{id}', [BdController::class, 'bd_profesores_edit_post'])->name('bd_profesores_edit_post');
Route::get('/bd/profesores/delete/{id}', [BdController::class, 'bd_profesores_delete'])->name('bd_profesores_delete');

Route::get('/bd/clases', [BdController::class, 'bd_clases'])->name('bd_clases');
Route::get('/bd/clases/{filtro}', [BdController::class, 'bd_clases_filtro'])->name('bd_clases_filtro');
Route::get('/bd/clases/add', [BdController::class, 'bd_clases_add'])->name('bd_clases_add');
Route::post('/bd/clases/add', [BdController::class, 'bd_clases_add_post'])->name('bd_clases_add_post');
Route::get('/bd/clases/edit/{id}', [BdController::class, 'bd_clases_edit'])->name('bd_clases_edit');
Route::post('/bd/clases/edit/{id}', [BdController::class, 'bd_clases_edit_post'])->name('bd_clases_edit_post');
Route::get('/bd/clases/delete/{id}', [BdController::class, 'bd_clases_delete'])->name('bd_clases_delete');

Route::get('/bd/estudiantes', [BdController::class, 'bd_estudiantes'])->name('bd_estudiantes');
Route::get('/bd/estudiantes/add', [BdController::class, 'bd_estudiantes_add'])->name('bd_estudiantes_add');
Route::post('/bd/estudiantes/add', [BdController::class, 'bd_estudiantes_add_post'])->name('bd_estudiantes_add_post');
Route::get('/bd/estudiantes/edit/{id}', [BdController::class, 'bd_estudiantes_edit'])->name('bd_estudiantes_edit');
Route::post('/bd/estudiantes/edit/{id}', [BdController::class, 'bd_estudiantes_edit_post'])->name('bd_estudiantes_edit_post');
Route::get('/bd/estudiantes/delete/{id}', [BdController::class, 'bd_estudiantes_delete'])->name('bd_estudiantes_delete');