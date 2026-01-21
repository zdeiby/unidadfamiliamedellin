@extends('layouts.visionarios')

@section('content')
<div class="container pt-2">
<img width="100%"   src="{{ asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg') }}" alt=""> 

<form id="Formulariovisionarios"  >
@csrf
        <div class="text-center pt-4 pb-4">
            <label for="" class="text-center"><b class="text-center">FORMULARIO VISION4RIOS</b></label>
        </div>

        <hr>

        <div class="progress" style="/*position: sticky; top: 0; z-index: 999; width: 100%;*/"   role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%"></div>
        </div>

        <hr>

        <div class="row g-3 was-validated pb-3"> 
            <div class="alert alert-info">
                Certificaciones adicionales en áreas especializadas           
            </div>

            <div class="col-md-4" id="documentodiv" style="display:none">
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="documento"  id="documento" value="{{$documento}}" required>
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="periodo"  id="periodo" value="{{$periodo}}" required>
                <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="tabla" name="tabla" value="{{$tabla}}" required>
                <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="estado" name="estado" value="1" required>
            </div>

            <div class="col-md">
                <label for="certificaciones" class="form-label">Certificaciones adicionales en áreas especializadas</label>
                <select class="form-control form-control-sm" id="certificaciones" name="certificaciones" required>
                    {!! str_replace('value="'.$certificaciones.'"', 'value="'.$certificaciones.'" selected', $t1_sino) !!}
                </select>
            </div>
            <div class="col-md" id="cuales_certificacionesdiv" style="display:none">
                <label for="cuales_certificaciones" class="form-label">Cuales</label>
                <input type="text" class="form-control form-control-sm" id="cuales_certificaciones" name="cuales_certificaciones" value="{{ $cuales_certificaciones ?? '' }}">
            </div>
        </div>

        <div class="row g-3 was-validated"> 
            <div class="col-md-6">
                <label for="disponibilidad_horas" class="form-label">¿Tiene disponibilidad de 15 horas semanales para clases?</label>
                <select class="form-control form-control-sm" id="disponibilidad_horas" name="disponibilidad_horas" required>
                    {!! str_replace('value="'.$disponibilidad_horas.'"', 'value="'.$disponibilidad_horas.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="dispositivo" class="form-label">¿Dispone de dispositivo (computador, tableta) para formación virtual?</label>
                <select class="form-control form-control-sm" id="dispositivo" name="dispositivo" required>
                    {!! str_replace('value="'.$dispositivo.'"', 'value="'.$dispositivo.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="internet" class="form-label">¿Tiene conexión a internet?</label>
                <select class="form-control form-control-sm" id="internet" name="internet" required>
                    {!! str_replace('value="'.$internet.'"', 'value="'.$internet.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="desplazamiento" class="form-label">Si no tiene internet, ¿puede desplazarse a la sede educativa?</label>
                <select class="form-control form-control-sm" id="desplazamiento" name="desplazamiento" required>
                    {!! str_replace('value="'.$desplazamiento.'"', 'value="'.$desplazamiento.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-12">
                <label for="proyecto_especializacion" class="form-label">¿Está dispuesto(a) a realizar un proyecto de especialización aplicado al sector productivo al finalizar el curso?</label>
                <select class="form-control form-control-sm" id="proyecto_especializacion" name="proyecto_especializacion" required>
                    {!! str_replace('value="'.$proyecto_especializacion.'"', 'value="'.$proyecto_especializacion.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-12">
                <label for="motivacion_proyecto" class="form-label">¿Cuál fue su principal motivación para participar en el proyecto?</label>
                <textarea type="text" class="form-control form-control-sm" id="motivacion_proyecto" name="motivacion_proyecto" required>{{ $motivacion_proyecto ?? '' }}</textarea>

            </div>

            <div class="col-md-6" id="nivel_educativodiv" style="display:none">
                <label for="nivel_educativo" class="form-label">Nivel educativo alcanzado</label>
                <select class="form-control form-control-sm" id="nivel_educativo" name="nivel_educativo" >
                    {!! str_replace('value="'.$nivel_educativo.'"', 'value="'.$nivel_educativo.'" selected', $t1_nivel_academico) !!}
                </select>
            </div>

            <div class="col-md-6 text-center" style="display:none">
                    <label for="validationServer04" id="adjuntar"  class="form-label" >Documento estudio:</label>
                    @if (($url_diploma  != ''))
                        <a id="adjunto3" href="{{asset('documentosAdjuntos/formulariovisionarios/' . basename($url_diploma))}}" target="_blank">Ver Documento</a>
                    @else
                    <label id="verDocumento" ></label>
                    <button type="button" class="btn btn-primary btn-sm" style="background:#663398 !important; border:none" data-bs-toggle="modal" data-bs-target="#modalSubirDocumentoPDF">
                    Adjuntar diploma o certificado
                </button>
                    @endif
                    <br>
                <!-- Botón para abrir el modal de subir documento PDF -->
                
            </div>

            <div class="col-md-6" id="estudiandodiv" style="display:none">
                <label for="estudiando" class="form-label">¿Actualmente está estudiando?</label>
                <select class="form-control form-control-sm" id="estudiando" name="estudiando" >
                    {!! str_replace('value="'.$estudiando.'"', 'value="'.$estudiando.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-6" id="nombre_colegiodiv" style="display:none" style="display:none">
                <label for="nombre_colegio" class="form-label">Nombre del colegio</label>
                <input type="text" class="form-control form-control-sm" id="nombre_colegio" name="nombre_colegio" value="{{ $nombre_colegio ?? '' }}">
            </div>

            <div class="col-md-6" id="grado_cursadodiv" style="display:none" style="display:none">
                <label for="grado_cursado" class="form-label">Grado cursado</label>
                <input type="text" class="form-control form-control-sm" id="grado_cursado" name="grado_cursado" value="{{ $grado_cursado ?? '' }}">
            </div>

            <div class="col-md-6" id="nombre_universidaddiv" style="display:none" style="display:none">
                <label for="nombre_universidad" class="form-label">Nombre de la universidad</label>
                <input type="text" class="form-control form-control-sm" id="nombre_universidad" name="nombre_universidad" value="{{ $nombre_universidad ?? '' }}">
            </div>

            <div class="col-md-6" id="programa_academicodiv" style="display:none" style="display:none">
                <label for="programa_academico" class="form-label">Programa académico</label>
                <input type="text" class="form-control form-control-sm" id="programa_academico" name="programa_academico" value="{{ $programa_academico ?? '' }}">
            </div>

            <div class="col-md-6" id="semestrediv" style="display:none" style="display:none">
                <label for="semestre" class="form-label">Semestre actual</label>
                <input type="number" class="form-control form-control-sm" id="semestre" min="0" max="99"  oninput="this.value=this.value.slice(0,2)" name="semestre" value="{{ $semestre ?? '' }}">
            </div>

            <div class="col-md-6" id="titulo_pregradodiv" style="display:none" style="display:none">
                <label for="titulo_pregrado" class="form-label">Título de pregrado</label>
                <input type="text" class="form-control form-control-sm" id="titulo_pregrado" name="titulo_pregrado" value="{{ $titulo_pregrado ?? '' }}">
            </div>

            <div class="col-md-12" id="titulo_posgradodiv" style="display:none" style="display:none">
                <label for="titulo_posgrado" class="form-label">Título de posgrado</label>
                <input type="text" class="form-control form-control-sm" id="titulo_posgrado" name="titulo_posgrado" value="{{ $titulo_posgrado ?? '' }}">
            </div>

            <div class="col-md-6">
                <label for="conocimientos_ti" class="form-label">¿Tiene conocimientos previos en TI?</label>
                <select class="form-control form-control-sm" id="conocimientos_ti" name="conocimientos_ti" required>
                    {!! str_replace('value="'.$conocimientos_ti.'"', 'value="'.$conocimientos_ti.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="estudios_ti" class="form-label">¿Tiene estudios relacionados con TI?</label>
                <select class="form-control form-control-sm" id="estudios_ti" name="estudios_ti" required>
                    {!! str_replace('value="'.$estudios_ti.'"', 'value="'.$estudios_ti.'" selected', $t1_sino) !!}
                </select>
            </div>
        </div>


       

            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                <a <?= $siguiente ?> id="siguiente" onclick="siguientePaso()" class="btn btn-outline-primary" >
                    FInalizar
                </a>
            </div>
        </div>
    </div>
    </form>
</div>  

<div class="modal fade" id="modalSubirDocumentoPDF" tabindex="-1" aria-labelledby="modalSubirDocumentoPDFLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSubirDocumentoPDFLabel">Subir Documento PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            <div class="card-body">
                        <form id="uploadForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="documento3" class="form-label">Selecciona un archivo:</label>
                                <input type="file" class="form-control" name="documento3" id="documento3" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Subir Archivo</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <p id="mensaje" class="text-success fw-bold"></p>
                            <p id="archivoSubido"></p>
                        </div>
                    </div>

                <div id="mensajeOk" class="mt-3 text-success" style="display: none;">✅ Documento subido correctamente.</div>
                <div id="mensajeNoOk" class="mt-3 text-danger" style="display: none;">❌ Error al subir el documento.</div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery desde Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

$(document).ready(function(){
    if('<?= $documento2 ?>' != ''){
            $('#condicionesvulnerabilidad').show();
        }
        if('<?= $documento2 ?>' != ''){
            $('#distincionessociales').show();
        }
        if('<?= $documento3 ?>' != ''){
            $('#certificacionesadicionales').show();
        }


        if($('#certificaciones').val() == '1'){
        $('#cuales_certificacionesdiv').css('display','');
        $('#cuales_certificaciones').attr('required','required');
    }else{
        $('#cuales_certificacionesdiv').css('display','none');
        $('#cuales_certificaciones').removeAttr('required');
        $('#cuales_certificaciones').val('NO APLICA');
    }

        
}); 



$('#certificaciones').change(function(){
    if($('#certificaciones').val() == '1'){
        $('#cuales_certificacionesdiv').css('display','');
        $('#cuales_certificaciones').attr('required','required');
        $('#cuales_certificaciones').val('')
    }else{
        $('#cuales_certificacionesdiv').css('display','none');
        $('#cuales_certificaciones').removeAttr('required');
        $('#cuales_certificaciones').val('NO APLICA');
    }
})


$(document).ready(function() {
    $('#nivel_educativo, #estudiando').change(function() {

        // Bachiller (ID: 1) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '1' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').show();
            $('#grado_cursadodiv').show();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();
            $('#nombre_colegio').attr('required', 'required');
            $('#grado_cursado').attr('required', 'required');

            $('#nombre_colegio').attr('required', 'required').val('');
            $('#grado_cursado').attr('required', 'required').val('');

            // $('#nombre_universidad').removeAttr('required');
            // $('#programa_academico').removeAttr('required');
            // $('#semestre').removeAttr('required');
            // $('#titulo_pregrado').removeAttr('required');
            // $('#titulo_posgrado').removeAttr('required');

            $('#nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A')
        }

        // Bachiller (ID: 1) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '1' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');


            
        }

        // Técnica/Tecnológica (ID: 2) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '2' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_universidad, #programa_academico, #semestre')
                .attr('required', 'required')
                .val('');

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Técnica/Tecnológica (ID: 2) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '2' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Pregrado (ID: 3) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '3' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_universidad, #programa_academico, #semestre')
                .attr('required', 'required')
                .val('');

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Pregrado (ID: 3) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '3' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').show();
            $('#titulo_posgradodiv').hide();

            $('#titulo_pregrado')
                .attr('required', 'required')
                .val('');

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Posgrado (ID: 4) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '4' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_universidad, #programa_academico, #semestre')
                .attr('required', 'required')
                .val('');

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Posgrado (ID: 4) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '4' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
           // $('#titulo_pregradodiv').show();
            $('#titulo_posgradodiv').show();

            $('#titulo_posgrado')
                .attr('required', 'required')
                .val('');

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado')
                .removeAttr('required')
                .val('N/A');
        }

    });


    if ($('#nivel_educativo').val() == '1' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').show();
            $('#grado_cursadodiv').show();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();
            $('#nombre_colegio').attr('required', 'required');
            $('#grado_cursado').attr('required', 'required');

            

            // $('#nombre_universidad').removeAttr('required');
            // $('#programa_academico').removeAttr('required');
            // $('#semestre').removeAttr('required');
            // $('#titulo_pregrado').removeAttr('required');
            // $('#titulo_posgrado').removeAttr('required');

            $('#nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A')
        }

        // Bachiller (ID: 1) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '1' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');


            
        }

        // Técnica/Tecnológica (ID: 2) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '2' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Técnica/Tecnológica (ID: 2) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '2' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Pregrado (ID: 3) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '3' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

           

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Pregrado (ID: 3) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '3' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
            $('#titulo_pregradodiv').show();
            $('#titulo_posgradodiv').hide();

          

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Posgrado (ID: 4) y Está Estudiando (ID: 1)
        if ($('#nivel_educativo').val() == '4' && $('#estudiando').val() == '1') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').show();
            $('#programa_academicodiv').show();
            $('#semestrediv').show();
            $('#titulo_pregradodiv').hide();
            $('#titulo_posgradodiv').hide();

            

            $('#nombre_colegio, #grado_cursado, #titulo_pregrado, #titulo_posgrado')
                .removeAttr('required')
                .val('N/A');
        }

        // Posgrado (ID: 4) y No Está Estudiando (ID: 0)
        if ($('#nivel_educativo').val() == '4' && $('#estudiando').val() == '2') {
            $('#nombre_colegiodiv').hide();
            $('#grado_cursadodiv').hide();
            $('#nombre_universidaddiv').hide();
            $('#programa_academicodiv').hide();
            $('#semestrediv').hide();
           // $('#titulo_pregradodiv').show();
            $('#titulo_posgradodiv').show();

            

            $('#nombre_colegio, #grado_cursado, #nombre_universidad, #programa_academico, #semestre, #titulo_pregrado')
                .removeAttr('required')
                .val('N/A');
        }

    // // Ejecutar validaciones al cargar la página para ajustar según valores preexistentes
    // $('#nivel_educativo, #estudiando').trigger('change');
});


function guardarFormulario(event) {
    event.preventDefault(); // Evita la recarga de la página

    const form = document.getElementById('Formulariovisionarios');
    const formData = new FormData();



    const inputsRequeridos = form.querySelectorAll("[required]");
    for (const input of inputsRequeridos) {
        if (!input.value.trim()) {
            console.log(`⚠️ Error: El campo "${input.name}" (ID="${input.id}") está vacío.`);
            input.classList.add("is-invalid"); // Agrega estilo de error
            input.focus(); // Enfoca el primer campo vacío
            mostrarAlerta("Advertencia", "Por favor, complete todos los campos obligatorios.", "warning");
            return; // Detiene la ejecución
        } else {
            input.classList.remove("is-invalid"); // Quita el estilo si está lleno
        }
    }

    // Recorrer todos los elementos del formulario y capturar ID, nombre y valor en mayúsculas
    for (let input of form.elements) {
        if (input.id && input.name) { // Solo si tienen ID y nombre
            if (input.type === "text" || input.type === "email" || input.tagName === "TEXTAREA") {
                formData.append(input.id, input.value.toUpperCase()); // Convierte a mayúsculas
            } else {
                formData.append(input.id, input.value); // Otros campos sin cambios
            }
        }
    }


    // let documentosAdjuntos = 0;

    //     try {
    //         const urlDiploma = document.getElementById('verDocumento')?.innerHTML.trim() || document.getElementById('adjunto3')?.href || '';

    //         if (!urlDiploma ) {
    //             mostrarAlerta('Advertencia', 'Debes adjuntar tu diploma de estudio, o certificado.', 'warning');
    //             return false;
    //         }
    //     } catch (error) {
    //         console.error('Error al verificar documentos adjuntos:', error);
    //     }



    // Enviar datos al backend
    fetch("{{ route('visionarios.guardar') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Formulario guardado:', data);
        showToast("Guardado Correctamente");
        $('#siguiente').css('display','');
    })
    .catch(error => {
        console.error('Error al guardar:', error);
        mostrarAlerta("Error", "Hubo un problema al guardar el formulario.", "error");
    });
}






// Función para mostrar alertas con SweetAlert
function mostrarAlerta(titulo, mensaje, tipo) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    });
}

// Función para mostrar alerta y recargar la página tras éxito
function mostrarAlertaReload(titulo, mensaje, tipo) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            location.reload(); // 🔄 Recargar página tras guardar
        }
    });
}




    </script>
<script>
    $(document).ready(function() {
            $('#uploadForm').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let documento = '<?= $documento ?>'; // Obtener el documento desde el atributo
                let periodo = '<?= $periodo ?>'; 

                formData.append('documento', documento);
                formData.append('periodo', periodo);
                $.ajax({
                    url: "{{ route('visionarios.subirDocumento') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#mensaje').text(response.mensaje);
                        if (response.file) {
                            $('#archivoSubido').html('<a href="' +response.file + '" target="_blank">Ver documento</a>');
                            $('#verDocumento').html('<a href="' +response.file + '" target="_blank">Ver documento</a>');
                            $('#adjuntar').css('display','none');
                        }
                    },
                    error: function(xhr) {
                        $('#mensaje').text('Error al subir el archivo.');
                    }
                });
            });
        });
</script>



<script>
    // Script para actualizar la barra de progreso del 75% al 100%
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('Formulariovisionarios');
    const progressBar = document.querySelector('.progress-bar');

    // Seleccionar todos los campos relevantes del formulario
    const inputElements = form.querySelectorAll('input[required], select[required], textarea[required]');
    const totalCampos = inputElements.length; // Total de campos obligatorios

    function actualizarProgreso() {
        let camposCompletados = 0;

        inputElements.forEach(element => {
            if (element.type === 'file') {
                if (element.files.length > 0) {
                    camposCompletados++;
                }
            } else if (element.type === 'checkbox' || element.type === 'radio') {
                if (element.checked) {
                    camposCompletados++;
                }
            } else if (element.value.trim() !== '') {
                camposCompletados++;
            }
        });

        let porcentajeProgreso = 75 + ((camposCompletados / totalCampos) * 25); // Rango del 75% al 100%
        porcentajeProgreso = Math.min(100, Math.max(75, porcentajeProgreso)); // Asegurar que se mantenga en el rango permitido

        progressBar.style.width = porcentajeProgreso + '%';
        progressBar.setAttribute('aria-valuenow', porcentajeProgreso);
    }

    // Escuchar cambios en los inputs
    inputElements.forEach(element => {
        element.addEventListener('input', actualizarProgreso);
        element.addEventListener('change', actualizarProgreso);
    });

    actualizarProgreso();
});


function siguientePaso() {
    const fechaInicio ='hoy';

    fetch("{{ route('visionarios.calculardatos') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // Si estás usando Laravel y necesitas protección CSRF:
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            fechainicio: fechaInicio
        })
    })
    .then(response => response.json())
    .then(data => {
            Swal.fire({
            title: '¿Formulario terminado con exito?',
            text: '¿Qué desea hacer?.',
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Seguir en el formulario',
            cancelButtonText: 'Salir',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                // Acción si el usuario acepta
               // window.location.href = "{{ route('visionarios.caracterizacion') }}";
                // Aquí puedes llamar a una función o hacer fetch
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Acción si el usuario cancela
                window.location.href = "https://www.sapiencia.gov.co";
            }
            });

    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
}


</script>


@endsection