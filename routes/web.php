<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas principales de tu aplicación.
| Puedes dividir las rutas en varios archivos para organizarlas mejor.
|
*/


Auth::routes();

// Ruta principal después del login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ Rutas para gestión de usuarios (accesibles solo si el usuario está autenticado)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/usuarios', [UserController::class, 'index'])->name('users.index'); // Lista de usuarios
//     Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create'); // Crear usuario
//     Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
//     Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// });

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (Auth::user()->rol == 23) {
            return $next($request);
        }
        return redirect('/home')->with('error', 'No tienes permisos para acceder.');
    }], function () {
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index'); // Lista de usuarios
        Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create'); // Crear usuario
        Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
        Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

Route::get('/logoutvisionarios', function () {
    $ruta = Session::get('usuario_externo.programa'); // Obtiene la ruta de la sesión o usa '205' por defecto
    Session::forget('usuario_externo'); // Elimina la sesión
    Session::flush(); // Borra toda la sesión si es necesario
    return Redirect::to("https://fondos.sapiencia.gov.co/convocatorias/acceso/index.php/Acceso_controller/fc_cargarvista?id=37&id_ruta={$ruta}");
})->name('logoutvisionarios');


// ✅ rutas para el formulario de autorización de imagen
require __DIR__ . '/FormularioAutorizacionImagen/webformularioautorizacionimagen.php';

// ✅ rutas para el formulario deinteres programas 
require __DIR__ . '/FormularioInteresProgramas/webformulariointeresprogramas.php';

// ✅ rutas para el formulario eventos
require __DIR__ . '/FormularioEventos/webformularioeventos.php';


// ✅ rutas para el formulario visionarios
require __DIR__ . '/FormularioVisionarios/webformulariovisionarios.php';

