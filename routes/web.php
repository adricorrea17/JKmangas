<?php

use App\Http\Controllers\AdminMangasController;
use App\Models\UsuariosPagos;
use App\Http\Controllers\EstrenosController;
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

Route::middleware(["control"])->group(function () {
    //Home
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('inicio');

    //Todos los mangas
    Route::get('mangas', [\App\Http\Controllers\EstrenosController::class, 'index'])->name('estrenos')->middleware(['ban']);

    Route::middleware(["auth"])->controller(\App\Http\Controllers\AdminMangasController::class)->group(function () {

        //Ver detalle de un manga
        Route::get('mangas/{id}', 'ver')->name('admin.mangas.ver')->whereNumber('id')->middleware(['ban']);
    });

    //Login
    Route::get('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('auth.login.form')->middleware(['redirect']);
    Route::post('inicio-sesion', [\App\Http\Controllers\AuthController::class, 'loginAccion'])->name('auth.login.accion')->middleware(['redirect']);

    //Registro
    Route::get('registro', [\App\Http\Controllers\AuthController::class, 'registroForm'])->name('auth.register.form')->middleware(['redirect']);
    Route::post('registro', [\App\Http\Controllers\AuthController::class, 'registroAccion'])->name('auth.register.accion')->middleware(['redirect']);

    
    //comentarios
    Route::post('comentario', [AdminMangasController::class, 'guardar'])->name('guardar.comentario');
}); 
//LogOut
    Route::post('out-sesion', [\App\Http\Controllers\AuthController::class, 'logOut'])->name('auth.logout');

//Verificacion de reduccion o eliminacion de plan
Route::post('verificacion', [\App\Http\Controllers\UsuariosPagosController::class, 'VerificacionPlan'])->name('verificacion')->middleware(['auth', 'ban']);

//editar plan
Route::post('cambiar-plan', [\App\Http\Controllers\UsuariosPagosController::class, 'cambiarPlan'])->name('cambiar-plan')->middleware(['auth']);

// Usuarios perfil -> publico
Route::get('perfil', [\App\Http\Controllers\AuthController::class, 'perfil'])->name('auth.perfil')->middleware(['auth']);
Route::get('perfil-form', [\App\Http\Controllers\AuthController::class, 'perfil_form'])->name('auth.perfil.form')->middleware(['auth']);
Route::post('perfil-edit', [\App\Http\Controllers\AuthController::class, 'perfil_edit'])->name('auth.perfil.accion')->middleware(['auth']);

//Pagar plan
Route::get('pagar-plan', [\App\Http\Controllers\UsuariosPagosController::class, 'CrearBotonPago'])->name('pagar-plan')->middleware(['auth', 'ban']);
Route::get('pago/feedback', [\App\Http\Controllers\UsuariosPagosController::class, 'respuestaPagoMP'])->name('pagar-feedback')->middleware(['auth']);


Route::middleware(["auth", "admin"])->controller(\App\Http\Controllers\AdminMangasController::class)->group(function () {

    //ABM
    Route::get('admin/mangas', 'index')->name('admin.mangas.lista');

    //Fomulario para agregar un nuevo manga
    Route::get('admin/mangas/nuevo', 'formNuevo')->name('admin.mangas.nuevo.form');
    Route::post('admin/mangas/nuevo', 'grabarNuevo')->name('admin.mangas.nuevo.grabar');

    //Fomulario para eliminar un manga
    Route::get('admin/mangas/{id}/eliminar', 'eliminarForm')->name('admin.mangas.eliminar.form')->whereNumber('id');
    Route::post('admin/mangas/{id}/eliminar', 'eliminarManga')->name('admin.mangas.eliminar.manga')->whereNumber('id');

    //Fomulario para editar un manga
    Route::get('admin/mangas/{id}/editar', 'editarForm')->name('admin.mangas.editar.form')->whereNumber('id');
    Route::post('admin/mangas/{id}/editar', 'editarManga')->name('admin.mangas.editar.manga')->whereNumber('id');

    //Listado de usuarios
    Route::get('admin/mangas/usuarios', 'usuarioLista')->name('admin.mangas.usuarios');

    //Detalle de usuarios
    Route::get('admin/mangas/usuarios/{id}', 'verUsuario')->name('admin.mangas.verusuario');

    //Ban y Desban
    Route::post('banear-usuario/{id}',  'banear')->name('admin.ban');

    //Dashboard
    Route::get('admin/dashboard',  'dashboard')->name('admin.dashboard');

    //Lista de pagos
    Route::get('admin/pagos', 'pagosLista')->name('admin.pagos');
});
