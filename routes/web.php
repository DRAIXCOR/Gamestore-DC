<?php

use App\Mail\BienvenidoMailable;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ComprarController;
use App\Models\Plataforma;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


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

Route::resource('comprar',ComprarController::class);

Route::post('/custom-login', [LoginController::class, 'customLogin'])->name('custom.login');

Route::post('/register', [LoginController::class, 'register']);

Route::get('plataforma/{plataforma}/catalogo', [PlataformaController::class, 'catalogo'])
    ->name('plataforma.catalogo');

Route::post('/realizar-compra', [ListasController::class, 'realizarCompra'])->name('realizar.compra');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//ruta para probar la creación de correos
Route::get('bienvenido', function(){
    Mail::to('ejemplo@ejemplo.com')->send(new BienvenidoMailable);
})->name('bienvenido');