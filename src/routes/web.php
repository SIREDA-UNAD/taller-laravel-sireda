<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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

// Creamos un grupo de rutas de usuarios. Se debe de haber autenticado para ingresar.
Route::group(['prefix' => '/usuarios', 'as' => 'usuario.', 'middleware' => ['auth', 'usuarios']], function () {
    // Ruta de listado de usuarios.
    Route::get('/', [UsuarioController::class, 'index'])->name('listado');
    // Ruta de creación de usuarios, por POST.
    Route::post('/', [UsuarioController::class, 'store'])->name('crear');
    // Ruta de visualización de editar usuarios.
    Route::get('/{usuario}/editar', [UsuarioController::class, 'edit'])->name('editar');
    // Ruta de actualización de datos de usuarios.
    Route::patch('/{usuario}/editar', [UsuarioController::class, 'update'])->name('actualizar');
});

// Creamos un grupo de rutas de posts. Se debe de haber autenticado para ingresar.
Route::group(['prefix' => '/posts', 'as' => 'post.', 'middleware' => ['auth', 'posts']], function () {
    // Ruta de listado de posts.
    Route::get('/', [PostController::class, 'index'])->name('listado');
    // Ruta de creación de posts, por POST.
    Route::post('/', [PostController::class, 'store'])->name('crear');
    // Ruta de visualización de editar posts.
    Route::get('/{post}/editar', [PostController::class, 'edit'])->name('editar');
    // Ruta para visualizar un post.
    Route::get('/{post}/ver', [PostController::class, 'show'])->name('ver')->withoutMiddleware(['auth', 'posts']);
    // Ruta de actualización de datos de posts.
    Route::patch('/{post}/editar', [PostController::class, 'update'])->name('actualizar');
});

Route::view('/inicio', 'index')->name('inicio');

Route::get('/welcome', function () {
    return view('welcome');
});

// Rutas de autenticación de la aplicación. Requerimos de estas para poder ingresar a nuestra aplicación de manera
// normal.
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirigimos todas las peticiones a / para el login.
Route::redirect('/', '/login');