@extends('layouts.visionarios')

@section('content')
<div class="container pt-2">
<img width="100%"   src="{{ asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg') }}" alt=""> 

<form id="Formulariovisionarios"  >
@csrf
        <div class="text-center pt-4 pb-4">
            <label for="" class="text-center"><b class="text-center">FORMULARIO VISION4RIOS</b></label>
        </div>

        <br>
        <div class="progress" role="progressbar"  style="/*position: sticky; top: 0; z-index: 999; width: 100%; padding-top:-2px*/"  aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%"></div>
        </div>
        <br>

        <div class="row g-3 was-validated"> 
      

        <div class="alert alert-info ">
            Distinciones Sociales               
        </div>
        <div class="col-md-4" id="documentodiv" style="display:none">
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="documento"  id="documento" value="{{$documento}}" required>
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="periodo"  id="periodo" value="{{$periodo}}" required>
                <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="tabla" name="tabla" value="{{$tabla}}" required>
                <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="estado" name="estado" value="1" required>
            </div>
        <div class="col-md-12">
            <label for="olimpiadas" class="form-label">Olimpiadas de conocimiento en grado 11º del bachillerato académico.</label>
            <select class="form-control form-control-sm" id="olimpiadas" name="olimpiadas" required>
                {!! str_replace('value="'.$olimpiadas.'"', 'value="'.$olimpiadas.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="lider_estudiantil" class="form-label">Haber sido líder estudiantil (Personero, Contralor estudiantil, Representante estudiantil ante el Consejo Directivo, Líder de Mediación Escolar, Representante de egresados ante el Consejo Directivo).</label>
            <select class="form-control form-control-sm" id="lider_estudiantil" name="lider_estudiantil" required>
                {!! str_replace('value="'.$lider_estudiantil.'"', 'value="'.$lider_estudiantil.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="ediles_jal" class="form-label">Los ediles de las JAL del Distrito de Medellín con elección vigente a la fecha de apertura de la convocatoria.</label>
            <select class="form-control form-control-sm" id="ediles_jal" name="ediles_jal" required>
                {!! str_replace('value="'.$ediles_jal.'"', 'value="'.$ediles_jal.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="consejeros_cccp" class="form-label">Los Consejeros Comunales y Corregéntales de Planeación CCCP del Distrito de Medellín con elección vigente a la fecha de apertura de la convocatoria.</label>
            <select class="form-control form-control-sm" id="consejeros_cccp" name="consejeros_cccp" required>
                {!! str_replace('value="'.$consejeros_cccp.'"', 'value="'.$consejeros_cccp.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="planeacion_cccp" class="form-label">Planeación CCCP del Distrito de Medellín con elección vigente a la fecha de apertura de la convocatoria.</label>
            <select class="form-control form-control-sm" id="planeacion_cccp" name="planeacion_cccp" required>
                {!! str_replace('value="'.$planeacion_cccp.'"', 'value="'.$planeacion_cccp.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="consejeros_cdj" class="form-label">Los Consejeros Distritales de Juventud CDJ del Distrito de Medellín con elección vigente a la fecha de apertura de la convocatoria.</label>
            <select class="form-control form-control-sm" id="consejeros_cdj" name="consejeros_cdj" required>
                {!! str_replace('value="'.$consejeros_cdj.'"', 'value="'.$consejeros_cdj.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="venteros_informales" class="form-label">Venteros Informales y los miembros de su núcleo familiar registrado en la Secretaría de Seguridad y Convivencia o quien haga sus veces.</label>
            <select class="form-control form-control-sm" id="venteros_informales" name="venteros_informales" required>
                {!! str_replace('value="'.$venteros_informales.'"', 'value="'.$venteros_informales.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="barristas" class="form-label">Barristas debidamente certificados por la Secretaría de Seguridad y Convivencia o quien haga sus veces.</label>
            <select class="form-control form-control-sm" id="barristas" name="barristas" required>
                {!! str_replace('value="'.$barristas.'"', 'value="'.$barristas.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="veteranos" class="form-label">Veteranos de las fuerzas armadas debidamente certificados por el Ministerio de Defensa Nacional.</label>
            <select class="form-control form-control-sm" id="veteranos" name="veteranos" required>
                {!! str_replace('value="'.$veteranos.'"', 'value="'.$veteranos.'" selected', $t1_sino) !!}
            </select>
        </div>



       
        </div>

            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                <a <?= $siguiente ?> id="siguiente" href="{{ route('visionarios.certificacionesadicionales') }}" class="btn btn-outline-primary" >
                    Siguiente
                </a>
            </div>
        </div>
    </div>
    </form>
</div>  

<!-- jQuery desde Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

$(document).ready(function(){
    if('<?= $documento ?>' != ''){
            $('#condicionesvulnerabilidad').show();
        }
        if('<?= $documento2 ?>' != ''){
            $('#distincionessociales').show();
        }
        if('<?= $documento3 ?>' != ''){
            $('#certificacionesadicionales').show();
        }
}); 

function guardarFormulario(event) {
    event.preventDefault(); // Evita la recarga de la página

    const form = document.getElementById('Formulariovisionarios');
    const formData = new FormData();



    const inputsRequeridos = form.querySelectorAll("[required]");
    for (const input of inputsRequeridos) {
        if (!input.value.trim()) {
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
    // Script para actualizar la barra de progreso del 50% al 75%
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('Formulariovisionarios');
    const progressBar = document.querySelector('.progress-bar');

    // Seleccionar todos los campos relevantes del formulario
    const inputElements = form.querySelectorAll('input[required], select[required]');
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

        let porcentajeProgreso = 50 + ((camposCompletados / totalCampos) * 25); // Rango del 50% al 75%
        porcentajeProgreso = Math.min(75, Math.max(50, porcentajeProgreso)); // Asegurar que se mantenga en el rango permitido
        
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

</script>


@endsection