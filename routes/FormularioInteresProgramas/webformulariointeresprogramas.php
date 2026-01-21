<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formulariointeresprogramas\FormularioInteresProgramasController;

// Grupo de rutas con prefijo "formularioautorizacionimagen"
Route::prefix('Formulariointeresprogramas')->group(function () {
    // Página principal del formulario
    Route::get('/formulario', [FormularioInteresProgramasController::class, 'fc_index']);

    // Guardar o actualizar formulario (POST)
    Route::post('/formulario/guardar', [FormularioInteresProgramasController::class, 'fc_guardar']);

    // Buscar un formulario por número de documento
    Route::get('/formulario/buscar/{documento}', [FormularioInteresProgramasController::class, 'fc_buscar']);
});
