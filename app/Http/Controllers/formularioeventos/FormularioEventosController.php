<?php

namespace App\Http\Controllers\formularioeventos;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FormularioEventos\FormularioEventos;  //imagick 
use App\Models\ListasGenerales\ListasGenerales;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;


class FormularioEventosController extends Controller
{
    public function fc_index(Request $request){
        
       // $eventos = FormularioEventos::latest()->get();

      // $eventos= FormularioEventos::with('asistentes')->get();

      $documento = Auth::user()->documento;

      $rol = Auth::user()->rol;
      $eventos = '';
      if($rol == '23'){
        $eventos = FormularioEventos::with('asistentes') // Trae TODOS los asistentes del evento
        ->get();
      }else{
         $eventos = FormularioEventos::with('asistentes') // Trae TODOS los asistentes del evento
      ->where('documento', $documento) // Filtra SOLO los eventos creados por el usuario
      ->get();
      }
        
     
  
        $datos['t1_tipo_reunion'] = ListasGenerales::obtenerOpciones('comunicaciones_laravel.t1_tipo_reunion');
        $datos['t1_modalidad'] = ListasGenerales::obtenerOpciones('comunicaciones_laravel.t1_modalidad');
  

        return view('formularioeventos/formulario', compact('eventos', 'datos'));
    }

    public function fc_guardar(Request $request)
    {

        $qrToken = strtoupper(substr(md5(uniqid()), 0, 8));
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'manager' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
        ]);

        // Guardar en la base de datos
        FormularioEventos::create([
            'documento'=>Auth::user()->documento,
            'name' => $request->name,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'manager' => $request->manager,
            'organizer' => $request->organizer,
            'qr_token' => $qrToken
        ]);

        return redirect()->route('formularioeventos.index')->with('success', 'Evento guardado exitosamente.');
    }

    public function generateQR($qrToken)
    {
        $evento = FormularioEventos::where('qr_token', $qrToken)->firstOrFail();
        $url = url('/Formularioeventos/registroevento/qr/' . $evento->qr_token); // URL con el token
    
        // Generar QR en formato SVG
        $qrCode = base64_encode(QrCode::format('svg')->size(200)->generate($url));
    
        return response()->json([
            'qrCode' => $qrCode,
            'url' => $url
        ]);
    }
    
}