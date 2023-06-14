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

//Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('inicio');

//Todos los mangas
Route::get('/mangas', [\App\Http\Controllers\EstrenosController::class, 'index'])->name('estrenos')->middleware(['ban']);

Route::middleware(["auth"])->controller(\App\Http\Controllers\AdminMangasController::class)->group(function () {
    //ABM
    Route::get('admin/mangas', 'index')->name('admin.mangas.lista')->middleware(['admin']);

    //Fomulario para agregar un nuevo manga
    Route::get('admin/mangas/nuevo', 'formNuevo')->name('admin.mangas.nuevo.form')->middleware(['admin']);
    Route::post('admin/mangas/nuevo', 'grabarNuevo')->name('admin.mangas.nuevo.grabar')->middleware(['admin']);

    //Ver detalle de un manga
    Route::get('mangas/{id}', 'ver')->name('admin.mangas.ver')->whereNumber('id')->middleware(['ban']);

    //Fomulario para eliminar un manga
    Route::get('admin/mangas/{id}/eliminar', 'eliminarForm')->name('admin.mangas.eliminar.form')->whereNumber('id')->middleware(['admin']);
    Route::post('admin/mangas/{id}/eliminar', 'eliminarManga')->name('admin.mangas.eliminar.manga')->whereNumber('id')->middleware(['admin']);

    //Fomulario para editar un manga
    Route::get('admin/mangas/{id}/editar', 'editarForm')->name('admin.mangas.editar.form')->whereNumber('id')->middleware(['admin']);
    Route::post('admin/mangas/{id}/editar', 'editarManga')->name('admin.mangas.editar.manga')->whereNumber('id')->middleware(['admin']);
});

//Listado de usuarios
Route::get('/admin/mangas/usuarios', [\App\Http\Controllers\AuthController::class, 'usuario'])->name('admin.mangas.usuarios')->middleware(['auth'])->middleware(['admin']);

//Detalle de usuarios
Route::get('/admin/mangas/usuarios/{id}', [\App\Http\Controllers\AuthController::class, 'ver'])->name('admin.mangas.verusuario')->middleware(['auth'])->middleware(['admin']);

//Login
Route::get('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('auth.login.form')->middleware(['redirect']);
Route::post('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginAccion'])->name('auth.login.accion')->middleware(['redirect']);

//Registro
Route::get('registro', [\App\Http\Controllers\AuthController::class, 'registroForm'])->name('auth.register.form')->middleware(['redirect']);
Route::post('registro', [\App\Http\Controllers\AuthController::class, 'registroAccion'])->name('auth.register.accion')->middleware(['redirect']);

//LogOut
Route::post('out-sesion', [\App\Http\Controllers\AuthController::class, 'logOut'])->name('auth.logout');

// Usuarios perfil -> publico
Route::get('perfil', [\App\Http\Controllers\AuthController::class, 'perfil'])->name('auth.perfil')->middleware(['auth']);
Route::get('perfil-form', [\App\Http\Controllers\AuthController::class, 'perfil_form'])->name('auth.perfil.form')->middleware(['auth']);
Route::post('perfil-edit', [\App\Http\Controllers\AuthController::class, 'perfil_edit'])->name('auth.perfil.accion')->middleware(['auth']);

//Ban y Desban
Route::post('/banear-usuario/{id}', [\App\Http\Controllers\AuthController::class, 'banear'])->name('admin.ban')->middleware(['auth'])->middleware(['admin']);
Route::post('/desbanear-usuario/{id}', [\App\Http\Controllers\AuthController::class, 'desbanear'])->name('admin.sacar-ban')->middleware(['auth'])->middleware(['admin']);



