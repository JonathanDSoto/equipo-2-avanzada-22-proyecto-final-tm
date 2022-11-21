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

Route::get('/crear-cuenta', function(){
    return view('auth.create');
})->name('create'); 


// proyectos

Route::get('/proyectos', function () {
    return view('proyects.index');
})->name('proyectos');

Route::get('/proyectos/detalles/', function () {
    return view('proyects.show');
})->name('showProyect');

Route::get('/proyectos/modulo/{id}', function () {
    return view('proyects.modulos');
})->name('modulo.proyect');

// usuarios
Route::get('/usuarios', function () {
    return view('users.index');
})->name('users');

Route::get('/usuarios/detalles', function () {
    return view('users.show');
})->name('showUsuario');

// reportes
Route::get('/reportes', function () {
    return view('reports.index');
})->name('report');

Route::get('/reportes/detalles', function () {
    return view('reports.show');
})->name('showReport');

//modulos
Route::get('/Modulos', function () {
    return view('modules.index');
})->name('modulos');

Route::get('/Modulos/detalles', function () {
    return view('modules.show');
})->name('showModulos');

//chacador 

Route::get('/checador', function () {
    return view('check.index');
})->name('authChecador');

Route::get('/checar-salida', function () {
    return view('Auth.logOut');
})->name('logOutChecador');

// calendario

Route::get('/calendario', function () {
    return view('calendar.index');
})->name('calendario');