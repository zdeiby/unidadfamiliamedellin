<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formularioeventos\FormularioEventosController;
use App\Http\Controllers\formularioeventos\FormularioController;
use App\Http\Controllers\formularioeventos\PdfAsistencia;




// Grupo de rutas con prefijo "formularioautorizacionimagen"
Route::middleware('auth')->prefix('Formularioeventos')->group(function () {
    // Página principal del formulario
    Route::get('/formulario', [FormularioEventosController::class, 'fc_index'])->name('formularioeventos.index');

    Route::get('/evento/qr/{id}', [FormularioEventosController::class, 'generateQR'])->name('evento.qr');

  

    // Guardar o actualizar formulario (POST)
    Route::post('/formulario/eventos', [FormularioEventosController::class, 'fc_guardar'])->name('events.store');

    // Buscar un formulario por número de documento
    Route::get('/formulario/buscar/{documento}', [FormularioEventosController::class, 'fc_buscar']);

    Route::get('/pdf/ver/{token}', [PdfAsistencia::class, 'verPDF'])->name('pdf.ver');

});


Route::prefix('Formularioeventos')->group(function () {
    Route::get('/registroevento/qr/{id}', [FormularioController::class, 'fc_index'])->name('registroevento.vista');
    Route::post('/registroevento/guardar', [FormularioController::class, 'fc_guardar'])->name('registroevento.guardar');
});

