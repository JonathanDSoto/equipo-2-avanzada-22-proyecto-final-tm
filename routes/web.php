        <?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Models\Module;
use GuzzleHttp\Middleware;
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

Route::get('/proyectos/{id}', [ProjectController::class, 'show'])->middleware('auth')->name('showProyect');

Route::get('/proyectos', [ProjectController::class, 'index'])->middleware('auth')->name('proyect');

/* Route::get('/proyectos/detalles/', function () {
    return view('proyects.show');
})->name('showProyect'); */

Route::put('/proyectos/{id}', [ProjectController::class, 'update'])->middleware('auth')->name('updateProyect');

Route::delete('/proyectos/{id}', [ProjectController::class, 'destroy'])->middleware('auth')->name('destroyProyect');
 
Route::post('/proyectos', [ProjectController::class, 'store'])->middleware('auth')->name('storeProject');

// Route::get('/proyectos/modulo/{id}', function () {
//     return view('proyects.modulos');
// })->name('moduloroyect');

// usuarios
/* Route::get('/usuarios', function () {
    return view('users.index');
})->name('users');
 */
Route::get('/usuarios', [UserController::class, 'index'])->middleware('auth')->name('users'); // middleware !!!

Route::get('/usuarios/{id}', [UserController::class, 'show'])->middleware('auth')->name('showUser');

Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->middleware('auth')->name('deleteUser'); 

Route::post('usuarios', [UserController::class, 'store'])->middleware('auth')->name('storeUser');

Route::put('usuarios/{id}',[UserController::class, 'update'])->middleware('auth')->name('updateUser'); 
/* Route::get('/usuarios/detalles', function () {
    return view('users.show');
})->name('showUser');
 */
// reportes
Route::get('/reportes', function () {
    return view('reports.index');
})->name('report');

Route::get('/reportes/detalles', function () {
    return view('reports.show');
})->name('showReport');

//modulos
/* Route::get('/modulos', function () {
    return view('modules.index');
})->name('modules'); */
Route::get('modulos', [ModuleController::class, 'index'])->middleware('auth')->name('modules');

Route::get('modulos/{id}', [ModuleController::class, 'show'])->middleware('auth')->name('showModules');

Route::put('modulos/{id}', [ModuleController::class, 'update'])->middleware('auth')->name('updateModule');

Route::post('modulos', [ModuleController::class, 'store'])->middleware('auth')->name('storeModule');

Route::delete('modulos/{id}', [ModuleController::class, 'destroy'])->middleware('auth')->name('destroyModule');

Route::post('attach-user-module', [ModuleController::class, 'attach_user'])->middleware('auth')->name('attachUser');

/* Route::get('/modulos/detalles', function () {
    return view('modules.show');
})->name('showModules'); */

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