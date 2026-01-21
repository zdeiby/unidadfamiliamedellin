<?php

namespace App\Http\Controllers\formulariointeresprogramas;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FormularioInteresProgramas\FormularioInteresProgramas;
use App\Models\ListasGenerales\ListasGenerales;

class FormularioInteresProgramasController extends Controller
{
    public function fc_index(Request $request){
        
        $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');  
        $datos['t1_como_se_entero_sapiencia'] = ListasGenerales::obtenerOpciones('t1_como_se_entero_sapiencia');
        $datos['t1_tipo_documento'] = ListasGenerales::obtenerOpciones('listas_generales.t1_tipo_documento');

        return view('formulariointeresprogramas/formulario', $datos);
    }


    public function fc_guardar(Request $request)
{
    try {
        // Guardar los datos en la base de datos
        $formulario = FormularioInteresProgramas::updateOrCreate(
            ['documento' => $request->documento], // 🔑 Clave primaria para buscar
             $request->all()
               
        );

        return response()->json([
            'message' => 'Formulario guardado exitosamente',
            'data' => $formulario
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al guardar el formulario',
            'details' => $e->getMessage(),
        ], 500);
    }
}


public function fc_buscar($documento)
{
    $formulario = FormularioInteresProgramas::where('documento', trim($documento))->first();

    if ($formulario) {
        return response()->json([
            'existe' => true,
            'nombre1' => $formulario->nombre1 ?? '',
            'nombre2' => $formulario->nombre2 ?? '',
            'apellido1' => $formulario->apellido1 ?? '',
            'apellido2' => $formulario->apellido2 ?? '',
            'tipodocumento' => $formulario->tipodocumento ?? '',
            'correo' => $formulario->correo ?? '',
            'otra_cual' => $formulario->otra_cual ?? '',
            'conocia_sapiencia' => $formulario->conocia_sapiencia ?? '',
            'como_se_entero' => $formulario->como_se_entero ?? '',
            'telefono' => $formulario->telefono ?? '',
            // Checkboxes (SI/NO)
            'matricula_cero' => $formulario->matricula_cero ?? 'NO',
            'medellin_virtual' => $formulario->medellin_virtual ?? 'NO',
            'estudia' => $formulario->estudia ?? 'NO',
            'fondos_sapiencia_pregrado' => $formulario->fondos_sapiencia_pregrado ?? 'NO',
            'fondos_sapiencia_postgrado' => $formulario->fondos_sapiencia_postgrado ?? 'NO',
            'bilinguismo' => $formulario->bilinguismo ?? 'NO',
            'premios_medellin_investiga' => $formulario->premios_medellin_investiga ?? 'NO',
        ]);
    }

    return response()->json(['existe' => false]);
}




   
}
