<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formulariovisionarios\CaracterizacionController;

// Grupo de rutas con prefijo "formularioautorizacionimagen"
Route::prefix('Formulariovisionarios')->group(function () {
    // Página principal del formulario
    // Route::get('/visionarios', [CaracterizacionController::class, 'fc_index'])->name('visionarios.caracterizacion');
    Route::match(['get', 'post'], '/visionarios', [CaracterizacionController::class, 'fc_index'])->name('visionarios.caracterizacion');
    Route::post('/subir-documento', [CaracterizacionController::class, 'subirDocumento'])->name('visionarios.subirDocumento');


    Route::get('/criteriosdepriorizacion', [CaracterizacionController::class, 'fc_criteriosdepriorizacion'])->name('visionarios.criteriosdepriorizacion');
    Route::get('/distincionessociales', [CaracterizacionController::class, 'fc_distincionessociales'])->name('visionarios.distincionessociales');
    Route::get('/certificacionesadicionales', [CaracterizacionController::class, 'fc_certificacionesadicionales'])->name('visionarios.certificacionesadicionales');

    Route::post('/calculardatos', [CaracterizacionController::class, 'calculardatos'])->name('visionarios.calculardatos');

    

    Route::get('/getmunicipios/{codigo_departamento}', [CaracterizacionController::class, 'getMunicipios'])->name('visionarios.getmunicipios');

    Route::get('/getcomunas/{codigo_municipio}', [CaracterizacionController::class, 'getComunas'])->name('visionarios.getcomunas');
    Route::get('/getbarrios/{codigo_comuna}', [CaracterizacionController::class, 'getBarrios'])->name('visionarios.getbarrios');

    
    // Guardar o actualizar formulario (POST)
    Route::post('/visionarios/guardar', [CaracterizacionController::class, 'guardarPeriodo'])->name('visionarios.guardar');

    // Buscar un formulario por número de documento
    Route::get('/visionarios/buscar/{documento}', [CaracterizacionController::class, 'fc_buscar']);


});
