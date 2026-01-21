<?php

namespace App\Http\Controllers\formulariovisionarios;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FormularioInteresProgramas\FormularioInteresProgramas;
use App\Models\FormularioVisionarios\VisionariosCaracterizacion;
use App\Models\FormularioVisionarios\VisionariosAdjuntos;
use App\Models\FormularioVisionarios\VisionariosCriteriosPriorizacion;
use App\Models\FormularioVisionarios\VisionariosDistincionesSociales;  
use App\Models\FormularioVisionarios\VisionariosCertificacionesAdicionales;  
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Models\ListasGenerales\ListasGenerales;
use Carbon\Carbon;

class CaracterizacionController extends Controller
{
    public function fc_index(Request $request){

        //$request->session()->regenerateToken(); 
        if (!empty($request->documento)) {
        session([
            'usuario_externo' => [
                'nombres' => $request->nombres,
                'documento' => $request->documento,
                'rol' => $request->rol,
                'periodo' => $request->periodo,
                'id_aplicativo' => $request->id_aplicativo,
                'programa'=> $request->id_ruta,
                'id_usuario'=> $request->id_usuario,
            ]
        ]);
    }

    if (!Session::has('usuario_externo')) {
        return Redirect::to('https://sapiencia.gov.co/'); // Redirige si no hay sesión
    }
        $datos['tabla'] ='visionarios_caracterizacion';
        $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');  
        $datos['t1_nivel_academico'] = ListasGenerales::obtenerOpciones('listas_generales.t1_nivel_academico');
        $datos['t1_estado_civil'] = ListasGenerales::obtenerOpciones('listas_generales.t1_estado_civil');
        $datos['t1_estrato'] = ListasGenerales::obtenerOpciones('listas_generales.t1_estrato');
        $datos['t1_identidad_genero'] = ListasGenerales::obtenerOpciones('listas_generales.t1_identidad_genero');
        $datos['t1_orientacion_sexual'] = ListasGenerales::obtenerOpciones('listas_generales.t1_orientacion_sexual');
        $datos['t1_programas'] = ListasGenerales::obtenerOpciones('listas_generales.t1_programas');
        $datos['t1_puntaje_sisben'] = ListasGenerales::obtenerOpciones('listas_generales.t1_puntaje_sisben');
        $datos['t1_sexo'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sexo');
        $datos['t1_tiempo_residencia'] = ListasGenerales::obtenerOpciones('listas_generales.t1_tiempo_residencia');
        $datos['t1_tipo_documento_2'] = ListasGenerales::obtenerOpciones('listas_generales.t1_tipo_documento_2');
        $datos['t1_consume_sustancias'] = ListasGenerales::obtenerOpciones('listas_generales.t1_consume_sustancias');
        $datos['t1_como_se_entero'] = ListasGenerales::obtenerOpciones('listas_generales.t1_como_se_entero');

        
        $datos['t1_viaprincipal'] = ListasGenerales::obtenerOpciones('listas_generales.t1_viaprincipal');
        $datos['t1_tipovia'] = ListasGenerales::obtenerOpciones('listas_generales.t1_tipovia');
        $datos['t1_nombrevia'] = ListasGenerales::obtenerOpciones('listas_generales.t1_nombrevia');
        $datos['t1_pais'] = ListasGenerales::obtenerOpciones('listas_generales.t1_pais');
        $datos['t1_departamento'] = ListasGenerales::obtenerDepartamentos();

        $datos['periodo']= session('usuario_externo.periodo');

        $datos['siguiente']='style="display:none"';
 
        $datos['documento'] = '';
        $datos['documento2'] = '';
        $datos['documento3'] = '';


        $datos['nombre1'] = '';
        $datos['nombre2'] = '';
        $datos['apellido1'] = '';
        $datos['apellido2'] = '';
        $datos['tipodocumento'] = '';
        $datos['telefono'] = '';
        $datos['celular'] = '';
        $datos['correo'] = '';
        $datos['fecha_nacimiento'] = '';
        $datos['nombre_tutor'] = '';
        $datos['estado_civil'] = '';
        $datos['sexo'] = '';
        $datos['identidad_genero'] = '';
        $datos['orientacion_sexual'] = '';
        $datos['lgbtiq'] = '';
        $datos['pais_nacimiento'] = '';
        $datos['departamento_nacimiento'] = '';
        $datos['municipio_nacimiento'] = '';
        $datos['pais_residencia'] = '';
        $datos['departamento_residencia'] = '';
        $datos['municipio_residencia'] = '';
        $datos['comuna_residencia'] = '';
        $datos['barrio_residencia'] = '';
        $datos['dirCampo1'] = '';
        $datos['dirCampo2'] = '';
        $datos['dirCampo3'] = '';
        $datos['dirCampo4'] = '';
        $datos['dirCampo5'] = '';
        $datos['dirCampo6'] = '';
        $datos['dirCampo7'] = '';
        $datos['dirCampo8'] = '';
        $datos['dirCampo9'] = '';
        $datos['direccion'] = '';
        $datos['tiempo_residencia'] = '';
        $datos['tiene_hijos'] = '';
        $datos['consume_sustancias'] = '';
        $datos['estrato_vivienda'] = '';
        $datos['puntaje_sisben'] = '';
        $datos['habeasdata'] = '';
        $datos['tipodocumento_tutor'] = '';
        $datos['documento_tutor'] = '';
        $datos['correo_tutor'] = '';
        $datos['telefono_tutor'] = '';

        $datos['url_cedula'] = '';
        $datos['url_servicios'] = '';
        $datos['como_entero'] = '';
        $datos['otro_cual'] = '';

        

        $adjunto = VisionariosAdjuntos::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();


      if ($adjunto) {
        $datos['url_cedula'] = $adjunto->url_cedula;
        $datos['url_servicios'] = $adjunto->url_servicios;
        }

        //   dd($datos['url_cedula'] ,
        //   $datos['url_servicios']);

       
        $registro = VisionariosCaracterizacion::obtenerUltimoRegistroPorDocumento(optional(session('usuario_externo'))['documento']);
       // dd($registro);

       if ($registro) {
        foreach ($registro->toArray() as $clave => $valor) {
            if ($clave === 'periodo') {
                $datos['periodoactual'] = $valor ?? '';
                continue; // Salta esta clave y sigue con las demás
            }
            $datos[$clave] = $valor ?? ''; // Si el valor es null, lo convierte en cadena vacía
        }

       if($datos['nombre1'] != '' && $datos['estado'] != '' && $datos['periodo'] == $datos['periodoactual']){$datos['siguiente']='';} 

    }

            $documento2 = VisionariosCriteriosPriorizacion::where('periodo', $datos['periodo'])
                ->where('documento', optional(session('usuario_externo'))['documento'])
                ->first();
            if ($documento2) {
                $datos['documento2'] = $documento2->documento;
            } 

            $documento3 = VisionariosDistincionesSociales::where('periodo', $datos['periodo'])
                ->where('documento', optional(session('usuario_externo'))['documento'])
                ->first();
            if ($documento3) {
                $datos['documento3'] = $documento3->documento;
            } 

            //dd($documento3);


    //$datos['periodo']='15';

    //dd($datos['nombre1']);
        
        return view('formulariovisionarios/caracterizacion', $datos);
    }

    public function fc_criteriosdepriorizacion(Request $request){
        if (!Session::has('usuario_externo')) {
            return Redirect::to('https://sapiencia.gov.co/'); // Redirige si no hay sesión
        }
        
        $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');  
        $datos['periodo']= session('usuario_externo.periodo');
        $datos['tabla'] ='visionarios_criterios_priorizacion';
        $adjunto = VisionariosCaracterizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();

        $datos['siguiente']='style="display:none"';
        $datos['victima_ruv'] = '';
        $datos['vbg_violencia'] = '';
        $datos['madres_prea'] = '';
        $datos['poblacion_afro'] = '';
        $datos['reinsercion'] = '';
        $datos['pos_penado'] = '';
        $datos['diversidad_funcional'] = '';

        $datos['documento2'] = '';
        $datos['documento3'] = '';


        //dd($adjunto->documento);

        if ($adjunto) {
            $datos['documento'] = $adjunto->documento;
        } else {
            $datos['documento'] = optional(session('usuario_externo'))['documento'] ?? '';
        }

        $registro = VisionariosCriteriosPriorizacion::where('documento', optional(session('usuario_externo'))['documento'])
            ->latest('periodo') // Ordena por ID de forma descendente
            ->first();

       if ($registro) {
        foreach ($registro->toArray() as $clave => $valor) {
            if ($clave === 'periodo') {
                $datos['periodoactual'] = $valor ?? '';
                continue; // Salta esta clave y sigue con las demás
            }
            $datos[$clave] = $valor ?? ''; // Si el valor es null, lo convierte en cadena vacía
        }

        if( $datos['estado'] != '' && $datos['periodo'] == $datos['periodoactual']){$datos['siguiente']='';} 

    }

        $documento2 = VisionariosCriteriosPriorizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();
        if ($documento2) {
            $datos['documento2'] = $documento2->documento;
        } 

        $documento3 = VisionariosDistincionesSociales::where('periodo', $datos['periodo'])
            ->where('documento', optional(session('usuario_externo'))['documento'])
            ->first();
        if ($documento3) {
            $datos['documento3'] = $documento3->documento;
        } 

        return view('formulariovisionarios/criteriosdepriorizacion', $datos);
    }

    public function fc_distincionessociales(Request $request){
        if (!Session::has('usuario_externo')) {
            return Redirect::to('https://sapiencia.gov.co/'); // Redirige si no hay sesión
        }
        
        $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');  
        $datos['periodo']= session('usuario_externo.periodo');
        $datos['tabla'] ='visionarios_distinciones_sociales';
        $adjunto = VisionariosCaracterizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();

        $datos['siguiente'] = 'style="display:none"';
        $datos['olimpiadas'] = '';
        $datos['lider_estudiantil'] = '';
        $datos['ediles_jal'] = '';
        $datos['consejeros_cccp'] = '';
        $datos['planeacion_cccp'] = '';
        $datos['consejeros_cdj'] = '';
        $datos['venteros_informales'] = '';
        $datos['barristas'] = '';
        $datos['veteranos'] = '';
        $datos['documento'] = optional(session('usuario_externo'))['documento'] ?? '';

        $datos['documento2'] = '';
        $datos['documento3'] = '';
        $datos['estado']='';

        $adjunto = VisionariosCriteriosPriorizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();
             if ($adjunto) {
                $datos['documento'] = $adjunto->documento;
            } else {
                $datos['documento'] = ''; // Valor por defecto
            }
        
        
        // Buscar el último registro basado en el periodo
        $registro = VisionariosDistincionesSociales ::where('documento', optional(session('usuario_externo'))['documento'])
            ->latest('periodo')
            ->first();
        
        // Si existe un registro, actualizar los valores de $datos
        if ($registro) {
            foreach ($registro->toArray() as $clave => $valor) {
                if (array_key_exists($clave, $datos)) {
                    if ($clave === 'periodo') {
                        $datos['periodoactual'] = $valor ?? '';
                        continue; // Salta esta clave y sigue con las demás
                    }
                    $datos[$clave] = $valor ?? ''; // Si el valor es null, lo convierte en cadena vacía
                }
            }
            if( $datos['estado'] != '' && $datos['periodo'] == $datos['periodoactual']){$datos['siguiente']='';} 

        }

        $documento2 = VisionariosCriteriosPriorizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();
        if ($documento2) {
            $datos['documento2'] = $documento2->documento;
        } 

        $documento3 = VisionariosDistincionesSociales::where('periodo', $datos['periodo'])
            ->where('documento', optional(session('usuario_externo'))['documento'])
            ->first();
        if ($documento3) {
            $datos['documento3'] = $documento3->documento;
        } 

        return view('formulariovisionarios/distincionessociales', $datos);
    }
    public function fc_certificacionesadicionales(Request $request){
        if (!Session::has('usuario_externo')) {
            return Redirect::to('https://sapiencia.gov.co/'); // Redirige si no hay sesión
        }
        
        $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');
        $datos['t1_nivel_academico'] = ListasGenerales::obtenerOpciones('listas_generales.t1_nivel_academico');
  
        $datos['periodo']= session('usuario_externo.periodo');
        $datos['tabla'] ='visionarios_certificaciones_adicionales';
        

        $datos['siguiente'] = 'style="display:none"';
        $datos['certificaciones'] = '';
        $datos['documento'] = optional(session('usuario_externo'))['documento'] ?? '';
        $datos['documento2'] = '';
        $datos['documento3'] = '';
        $datos['cuales_certificaciones'] = '';
        $datos['disponibilidad_horas'] = '';
        $datos['dispositivo'] = '';
        $datos['internet'] = '';
        $datos['desplazamiento'] = '';
        $datos['proyecto_especializacion'] = '';
        $datos['motivacion_proyecto'] = '';
        $datos['nivel_educativo'] = '';
        $datos['estudiando'] = '';
        $datos['nombre_colegio'] = '';
        $datos['grado_cursado'] = '';
        $datos['nombre_universidad'] = '';
        $datos['programa_academico'] = '';
        $datos['semestre'] = '';
        $datos['titulo_pregrado'] = '';
        $datos['titulo_posgrado'] = '';
        $datos['conocimientos_ti'] = '';
        $datos['estudios_ti'] = '';

        $datos['url_cedula'] = '';
        $datos['url_servicios'] = '';
        $datos['url_diploma'] = '';

        $adjunto = VisionariosAdjuntos::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();


      if ($adjunto) {
        $datos['url_cedula'] = $adjunto->url_cedula;
        $datos['url_servicios'] = $adjunto->url_servicios;
        $datos['url_diploma'] = $adjunto->url_diploma;


        
        }

        // Buscar el último registro basado en el periodo
        $registro = VisionariosCertificacionesAdicionales::where('documento', optional(session('usuario_externo'))['documento'])
            ->latest('periodo')
            ->first();

        // Si existe un registro, actualizar los valores de $datos
        if ($registro) {
            foreach ($registro->toArray() as $clave => $valor) {
                if ($clave === 'periodo') {
                    $datos['periodoactual'] = $valor ?? '';
                    continue; // Salta esta clave y sigue con las demás
                }
                $datos[$clave] = $valor ?? ''; // Si el valor es null, lo convierte en cadena vacía
            }
            if( $datos['estado'] != '' && $datos['periodo'] == $datos['periodoactual']){$datos['siguiente']='';} 

        }

        $documento2 = VisionariosCriteriosPriorizacion::where('periodo', $datos['periodo'])
        ->where('documento', optional(session('usuario_externo'))['documento'])
        ->first();
        if ($documento2) {
            $datos['documento2'] = $documento2->documento;
        } 

        $documento3 = VisionariosDistincionesSociales::where('periodo', $datos['periodo'])
            ->where('documento', optional(session('usuario_externo'))['documento'])
            ->first();
        if ($documento3) {
            $datos['documento3'] = $documento3->documento;
        } 

      //  dd($datos['documento2']);

        return view('formulariovisionarios/certificacionesadicionales', $datos);
    }


    public function getMunicipios($codigo_departamento)
    {
        return response()->json([
            'html' => ListasGenerales::obtenerMunicipiosPorDepartamento($codigo_departamento)
        ]);
    }

    public function getComunas($codigo_municipio)
    {
        return response()->json(ListasGenerales::obtenerComunasPorMunicipio($codigo_municipio));
    }

    public function getBarrios($codigo_comuna)
    {
        return response()->json(ListasGenerales::obtenerBarriosPorComuna($codigo_comuna));
    }
    
    
    public function guardarPeriodo(Request $request)
    {
        try {
            // Validar que el nombre de la tabla venga en el request
          
            // Obtener el nombre de la tabla desde el request
            $tabla = 'gep_laravel.' . strtolower($request->tabla);
    
            // Agregar timestamps y usuario al request
            $datos = $request->except('tabla'); // Evitar insertar el nombre de la tabla
            $datos['updated_at'] = Carbon::now();
            $datos['usuario'] =optional(session('usuario_externo'))['documento'] ?? '111';
    
            // Verificar si ya existe el registro
            $existe = DB::table($tabla)
                ->where('documento', $request->documento)
                ->where('periodo', $request->periodo)
                ->exists();
    
            if ($existe) {
                // Si existe, hacer UPDATE
                DB::table($tabla)
                    ->where('documento', $request->documento)
                    ->where('periodo', $request->periodo)
                    ->update($datos);
                   // dd($tabla);
                    if($tabla == 'gep_laravel.visionarios_certificaciones_adicionales'){
                        $resultado = DB::select('CALL gep_laravel.SP_Calculo_Criterio_Seleccion_Priorizacion(?, ? ,?)', [ $request->documento,  $request->periodo,$datos['usuario']]);
                    }
            } else {
                // Si no existe, agregar created_at y hacer INSERT
                $datos['created_at'] = Carbon::now();
                DB::table($tabla)->insert($datos);
                if($tabla == 'gep_laravel.visionarios_certificaciones_adicionales'){
                    $resultado = DB::select('CALL gep_laravel.SP_Calculo_Criterio_Seleccion_Priorizacion(?, ? ,?)', [ $request->documento,  $request->periodo,$datos['usuario']]);
                }
            }

           

    
            return response()->json(['message' => 'Datos guardados correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar los datos: ' . $e->getMessage()], 500);
        }
    }
    


    
    


//     public function fc_guardar(Request $request)
// {
//     try {
//         // Guardar los datos en la base de datos
//         $formulario = FormularioInteresProgramas::updateOrCreate(
//             ['documento' => $request->documento], // 🔑 Clave primaria para buscar
//              $request->all()
               
//         );

//         return response()->json([
//             'message' => 'Formulario guardado exitosamente',
//             'data' => $formulario
//         ], 201);

//     } catch (\Exception $e) {
//         return response()->json([
//             'error' => 'Error al guardar el formulario',
//             'details' => $e->getMessage(),
//         ], 500);
//     }
// }


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

public function subirDocumento(Request $request)
{

 
    // Guardar el archivo en public/documentosAdjuntos/formulariovisionarios
    if ($request->hasFile('documento1')) {
        $request->validate([
            'documento1' => 'required|mimes:pdf,doc,docx,xlsx|max:2048',
        ]);
        $archivo = $request->file('documento1'); // Asegúrate de usar el nombre correcto
        $documento = $request->input('documento'); // Obtener el valor de "documento"
        $periodo = $request->input('periodo'); // Obtener el valor de "periodo"
    
        // Remover espacios y caracteres especiales del periodo y documento
        $periodo = preg_replace('/[^A-Za-z0-9]/', '_', $periodo);
        $documento = preg_replace('/[^A-Za-z0-9]/', '_', $documento);
    
        // Obtener la extensión original del archivo
        $extension = $archivo->getClientOriginalExtension();
    
        // Concatenar periodo y documento como nombre de archivo
        $nombreArchivo = "{$periodo}_{$documento}_1.{$extension}";
    
        // Mover el archivo al destino
        $rutaDestino = public_path('documentosAdjuntos/formulariovisionarios');
        if (!file_exists($rutaDestino)) {
            mkdir($rutaDestino, 0775, true);
        }
        $archivo->move($rutaDestino, $nombreArchivo);
        $urlDocumento = $nombreArchivo;

        $existe = DB::table('gep_laravel.visionarios_adjuntos')
        ->where('periodo', $periodo)
        ->where('documento', $documento)
        ->exists();
    
        $datos = [
            'url_cedula' => $nombreArchivo, // Mantiene el valor si es null
            'usuario' => $documento,
            'updated_at' => now()
        ];
        
        // Si el registro NO existe, agregamos `created_at`
        if (!$existe) {
            $datos['created_at'] = now();
        }
    
         // Insertar o actualizar en la base de datos
         DB::table('gep_laravel.visionarios_adjuntos')->updateOrInsert(
            ['periodo' => $periodo, 'documento' => $documento], // Condición de búsqueda
            $datos // Datos a actualizar o insertar
        );

    
        return response()->json([
            'mensaje' => 'Documento subido correctamente.',
            'file' => asset("documentosAdjuntos/formulariovisionarios/$nombreArchivo")
        ]);
    }

    if ($request->hasFile('documento2')) {
        $request->validate([
            'documento2' => 'required|mimes:pdf,doc,docx,xlsx|max:2048',
        ]);
        $archivo = $request->file('documento2'); // Asegúrate de usar el nombre correcto
        $documento = $request->input('documento'); // Obtener el valor de "documento"
        $periodo = $request->input('periodo'); // Obtener el valor de "periodo"
    
        // Remover espacios y caracteres especiales del periodo y documento
        $periodo = preg_replace('/[^A-Za-z0-9]/', '_', $periodo);
        $documento = preg_replace('/[^A-Za-z0-9]/', '_', $documento);
    
        // Obtener la extensión original del archivo
        $extension = $archivo->getClientOriginalExtension();
    
        // Concatenar periodo y documento como nombre de archivo
        $nombreArchivo = "{$periodo}_{$documento}_2.{$extension}";
    
        // Mover el archivo al destino
        $rutaDestino = public_path('documentosAdjuntos/formulariovisionarios');
        if (!file_exists($rutaDestino)) {
            mkdir($rutaDestino, 0775, true);
        }
        $archivo->move($rutaDestino, $nombreArchivo);
        $urlCuenta = $nombreArchivo;


        $existe = DB::table('gep_laravel.visionarios_adjuntos')
        ->where('periodo', $periodo)
        ->where('documento', $documento)
        ->exists();
    
        $datos = [
            'url_servicios' => $nombreArchivo,
            'usuario' => $documento,
            'updated_at' => now()
        ];
        
        // Si el registro NO existe, agregamos `created_at`
        if (!$existe) {
            $datos['created_at'] = now();
        }
    
         // Insertar o actualizar en la base de datos
         VisionariosAdjuntos::updateOrCreate(
            ['periodo' => $periodo, 'documento' => $documento], // Condición de búsqueda
            $datos // Datos a actualizar o insertar
        );
    
        return response()->json([
            'mensaje' => 'Documento subido correctamente.',
            'file' => asset("documentosAdjuntos/formulariovisionarios/$nombreArchivo")
        ]);
    }


    if ($request->hasFile('documento3')) {
        $request->validate([
            'documento3' => 'required|mimes:pdf,doc,docx,xlsx|max:2048',
        ]);
        $archivo = $request->file('documento3'); // Asegúrate de usar el nombre correcto
        $documento = $request->input('documento'); // Obtener el valor de "documento"
        $periodo = $request->input('periodo'); // Obtener el valor de "periodo"
    
        // Remover espacios y caracteres especiales del periodo y documento
        $periodo = preg_replace('/[^A-Za-z0-9]/', '_', $periodo);
        $documento = preg_replace('/[^A-Za-z0-9]/', '_', $documento);
    
        // Obtener la extensión original del archivo
        $extension = $archivo->getClientOriginalExtension();
    
        // Concatenar periodo y documento como nombre de archivo
        $nombreArchivo = "{$periodo}_{$documento}_3.{$extension}";
    
        // Mover el archivo al destino
        $rutaDestino = public_path('documentosAdjuntos/formulariovisionarios');
        if (!file_exists($rutaDestino)) {
            mkdir($rutaDestino, 0775, true);
        }
        $archivo->move($rutaDestino, $nombreArchivo);
        $urlCuenta = $nombreArchivo;


        $existe = DB::table('gep_laravel.visionarios_adjuntos')
        ->where('periodo', $periodo)
        ->where('documento', $documento)
        ->exists();
    
        $datos = [
            'url_diploma' => $nombreArchivo,
            'usuario' => $documento,
            'updated_at' => now()
        ];
        
        // Si el registro NO existe, agregamos `created_at`
        if (!$existe) {
            $datos['created_at'] = now();
        }
    
         // Insertar o actualizar en la base de datos
         VisionariosAdjuntos::updateOrCreate(
            ['periodo' => $periodo, 'documento' => $documento], // Condición de búsqueda
            $datos // Datos a actualizar o insertar
        );
    
        return response()->json([
            'mensaje' => 'Documento subido correctamente.',
            'file' => asset("documentosAdjuntos/formulariovisionarios/$nombreArchivo")
        ]);
    }


    

    return response()->json(['mensaje' => 'Hubo un error al subir el archivo.'], 400);
}


public function calculardatos(Request $request)
{



    
    try {
        // Obtener el último registro del usuario autenticado por documento
        $registro = VisionariosCaracterizacion::obtenerUltimoRegistroPorDocumento(optional(session('usuario_externo'))['documento']);

        // Si no hay registro, puedes manejarlo
        if (!$registro) {
            return response()->json([
                'error' => 'No se encontró un registro asociado al documento.',
            ], 404);
        }

        // Simulamos la creación del formulario, puede ser un modelo o un objeto cualquiera
        // Aquí deberías crear o recuperar el formulario real:
        $formulario = $registro;


        // URL del banner para mostrar en el correo
        $bannerUrl = asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg');

        // Enviar el correo
        Mail::send([], [], function ($message) use ($formulario, $bannerUrl) {
            $message->to($formulario->correo)
                    ->from('convocatorias1@sapiencia.gov.co', 'Sapiencia')
                    ->subject('📄 Formulario Guardado Correctamente')
                    ->setBody('
                        <div style="font-family: Arial, sans-serif; text-align: center;">
                            <img src="' . $bannerUrl . '" style="width:100%; max-width:600px;" alt="Banner"><br><br>
                            <h2>¡Registro Exitoso!</h2>
                            <p>Hola <strong>' . $formulario->nombre1 . ' ' . $formulario->apellido1 . '</strong>,</p>
                            <p>Tu formulario ha sido registrado exitosamente.</p>
                        </div>
                    ', 'text/html');
        });

        // Respuesta JSON
        return response()->json([
            'message' => 'Formulario guardado exitosamente',
            'data' => $formulario,
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al guardar el formulario',
            'details' => $e->getMessage(),
        ], 500);
    }
}




    }

    


   

