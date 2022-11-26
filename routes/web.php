        <?php

use App\Http\Controllers\ProjectController;
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
/* Route::get('/login', function(){
    return view('auth.welcome');
})->name('login'); */

Route::get('/crear-cuenta', function(){
    return view('auth.create');
})->name('create'); 

// checador de empleados
Route::get('/', function(){
    return view('checkEmployees.index');
})->name('check.employees'); 

Route::get('/check-in', function(){
    return view('checkEmployees.check_in');
})->name('check_in.employees'); 

Route::get('/check-out', function(){
    return view('checkEmployees.check_out');
})->name('check_out.employees'); 

// proyectos

/* Route::get('/proyectos', function () {
    return view('proyects.index');//<=
})->name('proyect'); */

Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyect');

/* Route::get('/proyectos/detalles/', function () {
    return view('proyects.show');
})->name('showProyect'); */
Route::get('/proyectos/{id}', [ProjectController::class, 'show'])->name('showProyect');

Route::put('proyectos/{id}', [ProjectController::class, 'update'])->name('updateProyect');

Route::delete('proyectos/{id}', [ProjectController::class, 'destroy'])->name('destroyProyect');
 
Route::post('proyectos', [ProjectController::class, 'store'])->name('storeProject');
// Route::get('/proyectos/modulo/{id}', function () {
//     return view('proyects.modulos');
// })->name('moduloroyect');

// usuarios
Route::get('/usuarios', function () {
    return view('users.index');
})->name('users');

Route::get('/usuarios/detalles', function () {
    return view('users.show');
})->name('showUser');

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
})->name('modules');

Route::get('/Modulos/detalles', function () {
    return view('modules.show');
})->name('showModules');

//chacador 

Route::get('/checador', function () {
    return view('check.index');
})->name('authCheck');

Route::get('/checar-salida', function () {
    return view('Auth.logOut');
})->name('logOutCheck');

// calendario

Route::get('/calendario', function () {
    return view('calendar.index');
})->name('calendar');