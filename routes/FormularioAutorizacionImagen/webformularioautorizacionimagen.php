<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formularioautorizacionimagen\FormularioController;

// Grupo de rutas con prefijo "formularioautorizacionimagen"
Route::prefix('formularioautorizacionimagen')->group(function () {
    // Página principal del formulario
    Route::get('/formulario', [FormularioController::class, 'fc_index']);

    // Guardar o actualizar formulario (POST)
    Route::post('/formulario/guardar', [FormularioController::class, 'fc_guardar']);

    // Buscar un formulario por número de documento
    Route::get('/formulario/buscar/{documento}', [FormularioController::class, 'fc_buscar']);
});
