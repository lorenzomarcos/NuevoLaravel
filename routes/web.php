<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return 'Página de inicio';
});

Route::get('/notas', function () {

    $notes = [
        'Primera nota',
        'Segunda nota',
        'Tercera nota',
        'Cuarta nota',
        'Quinta nota',
    ];

    return view('notes.index')->with('notes', $notes);
});

Route::get('/notas/{id}', function ($id) {
    return 'Detalle de la nota: ' . $id;
});

Route::get('/notas/crear', function () {
    return view('notes.create');
});

Route::get('/notas/{id}/editar', function ($id) {
    return 'Editar nota: ' . $id;
});

Route::get('cursos', function () {
    return [
        'Cursos' => [
            'Curso de Laravel 10',
            'Curso de programación orientada a objetos',
            'Curso de Git',
        ]
    ];
});
