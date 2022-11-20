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


// proyectos

Route::get('/proyectos', function () {
    return view('proyectos.index');
})->name('proyectos');

Route::get('/proyectos/detalles/', function () {
    return view('proyectos.detalles');
})->name('userProyect');

Route::get('/proyectos/usuario/', function () {
    return view('proyectos.usuarios');
})->name('userProyect');

Route::get('/proyectos/modulo/{id}', function () {
    return view('proyectos.modulos');
})->name('moduloProyect');

// usuarios
Route::get('/usuarios', function () {
    return view('usuarios.index');
})->name('users');


Route::get('/usuarios/detalles', function () {
    return view('usuarios.detalles');
})->name('detallesUsuario');

//modulos
Route::get('/Modulos', function () {
    return view('modules.index');
})->name('modulos');

Route::get('/Modulos/detalles', function () {
    return view('modules.detalles');
})->name('detallesModulos');

//chacador 

Route::get('/checador', function () {
    return view('checador.index');
})->name('authChecador');

Route::get('/log-out', function () {
    return view('Auth.logOut');
})->name('logOutChecador');

// calendario

Route::get('/calendario', function () {
    return view('calendar.index');
})->name('calendario');