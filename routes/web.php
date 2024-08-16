<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormulariosController;


Route::get('/', [HomeController::class, 'home_inicio'])->name('home_inicio');
Route::get('/hola', [HomeController::class, 'home_hola'])->name('home_hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'home_parametros'])->name('home_parametros');

Route::get('/template', [TemplateController::class, 'template_inicio'])->name('template_inicio');
Route::get('/template/stack', [TemplateController::class, 'template_stack'])->name('template_stack');

Route::get('/formularios', [FormulariosController::class, 'formularios_inicio'])->name('formularios_inicio');
Route::get('/formularios/simple', [FormulariosController::class, 'formularios_simple'])->name('formularios_simple');
Route::post('/formularios/simple', [FormulariosController::class, 'formularios_simple_post'])->name('formularios_simple_post');


