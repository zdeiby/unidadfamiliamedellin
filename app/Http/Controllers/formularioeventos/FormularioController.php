<?php

namespace App\Http\Controllers\formularioeventos;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FormularioEventos\FormularioGuardarAsistentes;
use App\Models\FormularioEventos\FormularioEventos;
use App\Models\ListasGenerales\ListasGenerales;
use Illuminate\Support\Facades\Mail;

class FormularioController extends Controller
{
    public function fc_index(Request $request, $qr){
        
        // $datos['t1_sino'] = ListasGenerales::obtenerOpciones('listas_generales.t1_sino');
        // $datos['t1_tipo_documento'] = ListasGenerales::obtenerOpciones('listas_generales.t1_tipo_documento');
        $nombre = FormularioEventos::where('qr_token',$qr)->value('name');
        $datos['qr_token']= $qr;
        $datos['nombre']= $nombre;
        return view('formularioeventos/formularioregistro', $datos);
    }

    


    public function fc_guardar(Request $request)
    {
        try {
          
            $firmaUrl = null;
            $filename = null;
    

            if ($request->firma && $request->documento) {
                // 🔥 Eliminar espacios en blanco en la cédula
                $cedula = preg_replace('/\s+/', '', $request->documento);
            
                // 🔥 Validar si el dato es realmente Base64
                if (preg_match('/^data:image\/(png|jpeg|jpg);base64,/', $request->firma)) {
                    // Limpiar el Base64
                    $image = preg_replace('/^data:image\/\w+;base64,/', '', $request->firma);
                    $image = str_replace(' ', '+', $image);
                    $imageData = base64_decode($image);
            
                    if ($imageData === false) {
                        return response()->json([
                            'error' => 'La firma no es una imagen válida.'
                        ], 400);
                    }
            
                    // 🔥 Definir el nombre del archivo con la cédula (sin espacios)
                    $filename = $cedula . '.png'; 
                    $filePath = public_path('firma/') . $filename;
            
                    // Si la firma ya existe, eliminar el archivo anterior
                    if (file_exists($filePath)) {
                        unlink($filePath); // Elimina el archivo existente
                    }
            
                    // Guardar el nuevo archivo
                    if (file_put_contents($filePath, $imageData)) {
                        $firmaUrl = asset('firma/' . $filename);
                    } else {
                        return response()->json([
                            'error' => 'No se pudo guardar la firma.'
                        ], 500);
                    }
                } else {
                    return response()->json([
                        'error' => 'Formato de firma no válido.'
                    ], 400);
                }
            }
            
            $id = FormularioEventos::where('qr_token', $request->qr_token)->value('id');
    
            // Guardar los datos en la base de datos
            $formulario = FormularioGuardarAsistentes::updateOrCreate(
                [
                    'documento' => $request->documento, 
                    'id_evento' =>$id
                ],// 🔑 Clave primaria para buscar
                [
                    'nombre1' => strtoupper($request->nombre1),
                    'nombre2' => strtoupper($request->nombre2),
                    'apellido1' => strtoupper($request->apellido1),
                    'apellido2' => strtoupper($request->apellido2),
                    'cargo' => strtoupper($request->cargo),
                    // 'tipodocumento' => $request->tipodocumento,
                    // 'lugar_expedicion' => $request->lugar_expedicion,
                    // 'nombre_tutor' => strtoupper($request->nombre_tutor),
                    // 'tipodocumento_tutor' => $request->tipodocumento_tutor,
                    // 'documento_tutor' => $request->documento_tutor,
                    // 'lugar_expedicion_tutor' => strtoupper($request->lugar_expedicion_tutor),
                    // 'fecha_diligenciamiento' => $request->fecha_diligenciamiento,
                    'correo' => strtoupper($request->correo),
                    'telefono' => strtoupper($request->telefono),
                    // 'autorizacion' => $request->autorizacion,
                    'firma' => $filename, // Guarda solo el nombre del archivo
                ]
            );

              // 📩 Enviar el correo con la librería por defecto de Laravel

        
        

        // Mail::send([], [], function ($message) use ($formulario) {
        //     $tipoDocumento = $formulario->tipodocumento; // Valor del documento
        //     $textoDocumento = '';

        //     if ($tipoDocumento == 1) {
        //         $textoDocumento = 'CÉDULA DE CIUDADANÍA';
        //     } elseif ($tipoDocumento == 2) {
        //         $textoDocumento = 'TARJETA DE IDENTIDAD';
        //     } elseif ($tipoDocumento == 3) {
        //         $textoDocumento = 'CÉDULA DE EXTRANJERÍA';
        //     } else {
        //         $textoDocumento = 'Otro tipo de documento';
        //     }

        //     $bannerUrl = asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg');


        //     $message->to("{$formulario->correo}")
        //     ->from('convocatorias1@sapiencia.gov.co', 'Sapiencia') // 📌 Cambia el remitente si es necesario
        //     ->subject('📄 Formulario Guardado Correctamente')
        //     ->setBody("
        //         <div style='text-align: center;'>
        //             <img src='{$bannerUrl}' style='width:100%;' alt='Formulario de Autorización'>
        //         </div>
        //         <h2>¡Hola {$formulario->nombre1} {$formulario->apellido1}!</h2>

        //         <p>Se ha registrado con éxito la autorización de uso de imagen con fecha de autorización <strong>{$formulario->fecha_diligenciamiento}</strong>.</p>

        //         <p>Yo, <strong>{$formulario->nombre1} {$formulario->apellido1}</strong>, con número de documento <strong>{$textoDocumento}: {$formulario->documento}</strong>, expedida en <strong>{$formulario->lugar_expedicion}</strong>.</p>

        //         <p><strong>AUTORIZO</strong> al Municipio de Medellín para que fije, reproduzca, adapte y comunique la imagen (en fotografía o video) y/o la entrevista efectuadas a mí o mi representado, realizada bajo cualquier soporte, físico o digital, en estrategias comunicacionales de carácter informativo, corporativo, institucional y de movilización de la administración municipal, que se difundan públicamente por cualquier medio (impreso, internet, televisión, radio y cualquier otro medio de difusión), solo con fines institucionales, educativos, culturales o deportivos, dentro de los propósitos establecidos por el Municipio de Medellín, sin restricción de plazo temporal ni espacial.</p>

        //         <p>El Municipio de Medellín no podrá cederlo a terceros. Dicha cesión la realizo de manera gratuita, sin ánimo de recibir compensación económica alguna.</p>

        //         <p>En caso de entrevista, el suscrito entrevistado declara que es propietario de los derechos sobre el contenido de la entrevista o vela por los derechos de su representado y, en consecuencia, garantiza que puede otorgar la presente autorización sin limitación alguna al Municipio de Medellín. Todo esto en concordancia con el régimen legal que se encuentra establecido la Ley 23 de 1982 y Decisión 351 de la CAN.</p>

        //         <p>Igualmente, autorizo al Municipio de Medellín, identificado con NIT No. 890.905.211-1, que es quien actuará como responsable para el tratamiento de mis datos y/o de mi representado conforme a su Política de Tratamiento de Datos Personales, disponible en <a href='https://www.medellin.gov.co' target='_blank'>www.medellin.gov.co</a>, para que sean incluidos en sus bases de datos para llevar a cabo acciones relacionadas con sus funciones legales y su objeto misional, lo que comprende todas sus competencias funcionales incluyendo, sin limitación, todos los trámites, gestiones, servicios, consultas, notificaciones, registros, entre otros, que el Municipio requiera realizar en virtud de mi calidad de ciudadano. En esa medida, declaro que la información suministrada es correcta, veraz, verificable y actualizada.</p>

        //         <p>Declaro conocer que los datos de los menores de edad son datos sensibles de acuerdo con la normativa vigente, por lo tanto, <strong>NO</strong> me encuentro obligado a autorizar el tratamiento de los mismos. Sin embargo, declaro otorgar, de manera previa, explícita, informada, voluntaria y expresa, la correspondiente autorización.</p>

        //         <p>Finalmente, sé que mi representado y yo tenemos derecho a conocer, consultar, actualizar, rectificar y suprimir la información, solicitar prueba de esta autorización y revocarla (cuando ello sea posible y no se requieran los datos en virtud de las funciones legales del Municipio de Medellín), derechos que se me ha informado puedo ejercer a través de los canales: portal web <a href='https://www.medellin.gov.co' target='_blank'>www.medellin.gov.co</a>, línea de atención 4444144, Centro de Servicios a la Ciudadanía (Calle 44 N 52 - 165 la Alpujarra) y sedes externas de la entidad (Casas de Gobierno, Mascerca y Centros de Servicios al Ciudadano - pueden consultarse en la Línea de Atención).</p>

        //         <br>
        //         <p>Atentamente,</p>
        //         <p><strong>Sapiencia</strong></p>
        //     ", 'text/html'); // 📌 Se envía en formato HTML para conservar la estructura
        //     });

            
            
    
            return response()->json([
                'message' => 'Formulario guardado exitosamente',
                'data' => $formulario,
                'firma_url' => $firmaUrl
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al guardar el formulario',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
    

//     public function fc_buscar($documento)
// {
//     $formulario = FormularioAutorizacionImagen::where('documento', trim($documento))->first();

//     if ($formulario) {
//         return response()->json([
//             'existe' => true,
//             'nombre1' => $formulario->nombre1,
//             'nombre2' => $formulario->nombre2,
//             'apellido1' => $formulario->apellido1,
//             'apellido2' => $formulario->apellido2,
//             'tipodocumento' => $formulario->tipodocumento,
//             'lugar_expedicion' => $formulario->lugar_expedicion,
//             'nombre_tutor' => $formulario->nombre_tutor,
//             'tipodocumento_tutor' => $formulario->tipodocumento_tutor,
//             'documento_tutor' => $formulario->documento_tutor,
//             'lugar_expedicion_tutor' => $formulario->lugar_expedicion_tutor,
//             'fecha_diligenciamiento' => $formulario->fecha_diligenciamiento,
//             'correo' => $formulario->correo,
//             'autorizacion' => $formulario->autorizacion,
//             'firma' => $formulario->firma,
//         ]);
//     }

//     return response()->json(['existe' => false]);
// }



   
}
