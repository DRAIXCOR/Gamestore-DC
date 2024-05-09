<?php

use App\Http\Controllers\JuegosController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\LoginController;
use App\Models\Plataforma;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Auth\RegisterController;
=======
>>>>>>> b6c69c269a806615402c14a463030290375621fa

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

<<<<<<< HEAD
Route::post('/custom-login', [LoginController::class, 'customLogin'])->name('custom.login');



Route::post('/register', [LoginController::class, 'register']);



=======
>>>>>>> b6c69c269a806615402c14a463030290375621fa
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});