<?php

use App\Http\Controllers\JuegosController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\PrincipalController;
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

Route::resource('plataforma',PlataformaController::class);

Route::resource('juego', JuegosController::class);

Route::resource('lista', ListasController::class);
