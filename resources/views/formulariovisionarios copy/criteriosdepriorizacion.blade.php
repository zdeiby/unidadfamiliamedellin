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

        <div class="alert alert-info ">
            Condición de vulnerabilidad          
        </div>
        <br>

        <div class="row g-3 was-validated"> 
        <div class="col-md-4" id="documentodiv" style="display:none">
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="documento"  id="documento" value="{{$documento}}" required>
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="periodo"  id="periodo" value="{{$periodo}}" required>
                <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="tabla" name="tabla" value="{{$tabla}}" required>
            </div>
        <div class="col-md-12">
        <label for="victima_ruv" class="form-label">Condición de víctima con registro en RUV.</label>
        <select class="form-control form-control-sm" id="victima_ruv" name="victima_ruv" required>
        {!! str_replace('value="'.$victima_ruv.'"', 'value="'.$victima_ruv.'" selected', $t1_sino) !!}
        </select>
        </div>

        <div class="col-md-6">
            <label for="vbg_violencia" class="form-label">Mujeres víctimas de violencia basada en género VBG y violencia sexual.</label>
            <select class="form-control form-control-sm" id="vbg_violencia" name="vbg_violencia" required>
            {!! str_replace('value="'.$vbg_violencia.'"', 'value="'.$vbg_violencia.'" selected', $t1_sino) !!}
            </select>
        </div>

        

        <div class="col-md-6">
            <label for="madres_prea" class="form-label">Madres adolescentes pertenecientes al Sistema de Prevención de Riesgo de Embarazo Adolescente PREA.</label>
            <select class="form-control form-control-sm" id="madres_prea" name="madres_prea" required>
            {!! str_replace('value="'.$madres_prea.'"', 'value="'.$madres_prea.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="poblacion_afro" class="form-label">Población afrocolombiana, indígenas y gitanos RROM.</label>
            <select class="form-control form-control-sm" id="poblacion_afro" name="poblacion_afro" required>
            {!! str_replace('value="'.$poblacion_afro.'"', 'value="'.$poblacion_afro.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="reinsercion" class="form-label">Población en procesos institucionales de reinserción, reintegración o reincorporación.</label>
            <select class="form-control form-control-sm" id="reinsercion" name="reinsercion" required>
            {!! str_replace('value="'.$reinsercion.'"', 'value="'.$reinsercion.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-12">
            <label for="pos_penado" class="form-label">Personas que acrediten la condición de pos penado o que provengan de una institución de protección en el marco del proceso administrativo de restablecimiento de derechos (PARD) o del Sistema de Responsabilidad Penal para Adolescentes (SRPA).</label>
            <select class="form-control form-control-sm" id="pos_penado" name="pos_penado" required>
            {!! str_replace('value="'.$pos_penado.'"', 'value="'.$pos_penado.'" selected', $t1_sino) !!}
            </select>
        </div>

        <div class="col-md-8">
            <label for="diversidad_funcional" class="form-label">Personas en situación de diversidad funcional (discapacidad) certificada por la entidad.</label>
            <select class="form-control form-control-sm" id="diversidad_funcional" name="diversidad_funcional" required>
            {!! str_replace('value="'.$diversidad_funcional.'"', 'value="'.$diversidad_funcional.'" selected', $t1_sino) !!}
            </select>
        </div>

      



    </div>

            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                <a <?= $siguiente ?> id="siguiente" href="{{ route('visionarios.distincionessociales') }}" class="btn btn-outline-primary" >
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
    // Script para actualizar la barra de progreso al completar el formulario

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

        let porcentajeProgreso = 25 + ((camposCompletados / totalCampos) * 25); // Rango del 25% al 50%
        porcentajeProgreso = Math.min(50, Math.max(25, porcentajeProgreso)); // Asegurar que esté en el rango permitido
        
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