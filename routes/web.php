<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These``
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Route::get('/', function(){
    return view('auth.welcome');
})->name('login');

Route::get('/createAccount', function(){
    return view('auth.create');
})->name('create'); 

Route::get('/users', function () {
    return view('usuarios.index');
})->name('usuarios');

// proyectos

Route::get('/proyectos', function () {
    return view('proyectos.index');
})->name('proyectos');


Route::get('/proyectos/usuario/', function () {
    return view('proyectos.usuarios');
})->name('userProyect');

Route::get('/proyectos/modulo/{id}', function () {
    return view('proyectos.modulos');
})->name('moduloProyect');

//modulos

//chacador 

Route::get('/checador', function () {
    return view('checador.index');
})->name('authChecador');

Route::get('/checador/detalles-usuario', function () {
    return view('checador.detalles');
})->name('detallesChecador');