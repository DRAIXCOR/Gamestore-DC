<?php

use App\Http\Controllers\JuegosController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\LoginController;
use App\Models\Plataforma;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal/{Tipo?}', [PrincipalController::class, 'prin']); 

Route::resource('lista', ListasController::class)->parameters([
    'lista' => 'lista'
]);

Route::resource('plataforma',PlataformaController::class);

Route::resource('juego', JuegosController::class);

//Route::resource('login', LoginController::class);


//Route::view('/login', 'login')->name('login');
//Route::view('/registro',"register")->name('registro');
//Route::view('/privada',"secret")->middleware('auth')->name('privada');

//Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
//Route::post('/inicia-sesion',[LoginController::class,'login'])->name('inicia-sesion');
//Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Route::post('/registro',[LoginController::class,'registro'])->name('registro');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
