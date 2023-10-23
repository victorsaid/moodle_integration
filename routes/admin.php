<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.index');
});


Route::resource('/categorias', \App\Http\Controllers\Admin\CategoriaController::class)
    ->names('admin.categoria');

Route::get('categorias/delete/{id}', [\App\Http\Controllers\Admin\CategoriaController::class, 'delete'])
    ->name('admin.categoria.delete');
Route::post('categorias/remove/{id}', [\App\Http\Controllers\Admin\CategoriaController::class, 'remove'])
    ->name('admin.categoria.remove');


Route::resource('/cursos',\App\Http\Controllers\Admin\CursoController::class)
    ->names('admin.categoria');






