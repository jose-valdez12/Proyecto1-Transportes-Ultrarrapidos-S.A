<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route para el welcome
Route::get('/', function () {
    return view('layouts.welcome');
});


//Route para el blade de home
Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->middleware('auth');


//RUTAS DE TRANSPORTISTA
Route::get('/home',[\App\Http\Controllers\Transportistascontroller::class,'index'])->name('transportista.index');
Route::get('/create',[\App\Http\Controllers\Transportistascontroller::class,'create'])->name('transportista.create');
Route::post('Transportista/store',[\App\Http\Controllers\Transportistascontroller::class,'store'])->name('transportista.store');
Route::get('Transportista/edit/{id_transportistas}',[\App\Http\Controllers\Transportistascontroller::class,'edit'])->name('transportista.edit');
Route::put('Transportista/update/{id_transportistas}',[\App\Http\Controllers\Transportistascontroller::class,'update'])->name('transportista.update');
Route::get('Transportista/show/{id_transportistas}',[\App\Http\Controllers\Transportistascontroller::class,'show'])->name('transportista.show');
Route::delete('Transportista/destroy', [\App\Http\Controllers\Transportistascontroller::class,'destroy'])->name('transportista.destroy');


//Rutas Log-out
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// ruta camiones
use App\Http\Controllers\CamionesController;
Route::get('/home',[\App\Http\Controllers\CamionesController::class,'index'])->name('camion.index');
Route::get('/camion/create',[\App\Http\Controllers\CamionesController::class,'create'])->name('camion.create');
Route::post('/camion',[\App\Http\Controllers\CamionesController::class,'store'])->name('camion.store');
Route::get('/camion/{id}/edit', [\App\Http\Controllers\CamionesController::class, 'edit'])->name('camion.edit');
Route::put('/camion/{id}/update', [\App\Http\Controllers\CamionesController::class, 'update'])->name('camion.update');
Route::get('/camion/{id}/delete', [\App\Http\Controllers\CamionesController::class, 'delete'])->name('camion.delete');


//ruta del login

/*Route::get('views/auth/login', function () {
    return view('auth/login');
})->name('login');*/

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

