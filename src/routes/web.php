<?php

use App\Http\Controllers\UsuarioController;
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

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuario.listado');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuario.crear');

Route::get('/welcome', function () {
    return view('welcome');
});
