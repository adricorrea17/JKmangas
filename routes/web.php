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
Route::get('/estrenos', [\App\Http\Controllers\EstrenosController::class, 'index'])->name('estrenos');

Route::middleware(["auth"])->controller(\App\Http\Controllers\AdminMangasController::class)->group(function () {
    //ABM
    Route::get('admin/mangas', 'index')->name('admin.mangas.lista')->middleware(['admin']);

    //Fomulario para agregar un nuevo manga
    Route::get('admin/mangas/nuevo', 'formNuevo')->name('admin.mangas.nuevo.form')->middleware(['admin']);
    Route::post('admin/mangas/nuevo', 'grabarNuevo')->name('admin.mangas.nuevo.grabar')->middleware(['admin']);

    //Ver detalle de un manga
    Route::get('admin/mangas/{id}', 'ver')->name('admin.mangas.ver')->whereNumber('id');

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
Route::get('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('auth.login.form');
Route::post('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginAccion'])->name('auth.login.accion');

//Registro
Route::get('registro', [\App\Http\Controllers\AuthController::class, 'registroForm'])->name('auth.register.form');
Route::post('registro', [\App\Http\Controllers\AuthController::class, 'registroAccion'])->name('auth.register.accion');

//LogOut
Route::post('out-sesion', [\App\Http\Controllers\AuthController::class, 'logOut'])->name('auth.logout');

// Usuarios perfil -> publico
Route::get('perfil', [\App\Http\Controllers\AuthController::class, 'perfil'])->name('auth.perfil')->middleware(['auth']);

Route::post('perfil-edit', [\App\Http\Controllers\AuthController::class, 'perfil_edit'])->name('auth.perfil.accion');

