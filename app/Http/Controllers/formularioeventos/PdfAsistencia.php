<?php

namespace App\Http\Controllers\formularioeventos;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\FormularioEventos\FormularioEventos;
use App\Models\FormularioEventos\FormularioGuardarAsistentes;

class PdfAsistencia extends Controller
{
    public function verPDF($token)
    {
        // 🔍 Buscar el evento por qr_token
        $evento = FormularioEventos::where('qr_token', $token)->firstOrFail();
        $integrante = FormularioGuardarAsistentes::where('id_evento', $evento->id)->get();

        // 📌 Datos para el PDF
        $datos = [
            'titulo' => $evento->name,
            'contenido' => $evento->manager,
            'horaInicio' =>  date("g:i A", strtotime($evento->start_time)),
            'horaFin' => date("g:i A", strtotime($evento->end_time)),
            'organizador' => $evento->organizer,
            'fecha' => date('d/m/Y', strtotime($evento->start_date)),
            'tipo_reunion'    => (int) $evento->tipo_reunion,
            'modalidad_reunion'       => (int) $evento->modalidad_reunion,
        ];


        $filasPorPagina = 10;
        $totalRegistros = count($integrante);
        $totalPaginas = ceil($totalRegistros / $filasPorPagina);

        // Pasar la cantidad total de páginas a la vista
        $datos['totalPaginas'] = $totalPaginas;
        //$datos['filasPorPagina'] = $filasPorPagina;

        
    
        // 📝 Generar PDF
        $pdf = PDF::loadView('formularioeventos/verpdf', compact('datos', 'integrante'))  ->setPaper('a4', 'landscape');
        return $pdf->stream('asistencia-evento.pdf'); // 👀 Ver en el navegador
    }
}
