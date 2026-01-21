<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Firma Digital</title>

    <!-- CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <style>

body {
    font-family: 'Poppins', sans-serif;
}
  #draw-canvas {
    border: 2px solid #0dcaf0;
    cursor: crosshair;
    width: 100%;
    max-width: 500px;
    height: auto;
    aspect-ratio: 5 / 2; /* Relación de aspecto para que el canvas no se deforme */
    display: block;
    margin: auto;
}

.firma-box {
    width: 100%;
    max-width: 500px;
    height: auto;
    aspect-ratio: 5 / 2;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin: auto;
}

#draw-image {
    max-width: 100%;
    max-height: 100%;
    display: none; /* Inicialmente oculta la firma */
}

.form-check-label {
    white-space: normal; /* Permite saltos de línea */
    word-wrap: break-word; /* Rompe palabras largas */
    max-width: 300px; /* Ajusta este valor según el diseño deseado */
}
    </style>
</head>
<body >
<div class="container pt-2">
<img width="100%"   src="{{ asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg') }}" alt=""> 

<form id="Formulariointeresprogramas"  >
@csrf
        <div class="text-center pt-4 pb-4">
            <label for=""><b>Formulario Interés PROGRAMAS SAPIENCIA</b></label>
        </div>

        <div class="alert alert-info ">
        

        Por medio de la presente AUTORIZO a La Agencia de Educación Postsecundaria de Medellín - SAPIENCIA de manera libre, previa, expresa, voluntaria e informada, para que de acuerdo con lo establecido en la Ley 1581 de 2012 y el Decreto 1377 de 2013, realice el tratamiento, almacenamiento, recolección y uso de mis datos personales y aplique su régimen de protección, para la comunicación y para el uso relacionado con todos los aspectos atinentes a las convocatorias de educación realizadas por La Agencia.
Los derechos de mis datos son los previstos en la constitución y la ley, especialmente el derecho a conocer, actualizar, rectificar la información personal; los cuales puedo ejercer a través de la Dirección Técnica de Fondos de la Agencia y observando la política de tratamiento de datos personales de La Agencia disponible en el Manual de Política Interna de Tratamiento y Protección de Datos Personales.
Así mismo, autorizo él envió de mensajes con contenidos institucionales, notificaciones, información del estado de cuenta, saldos, cuotas pendientes de pago y demás información relativa al portafolio de servicios de la entidad, a través del correo electrónico Institucional dado el caso. 
Autorizo a la Agencia a suministrar la información: 1) A mis causahabientes o mis representantes legales; 2) A las entidades públicas o administrativas en ejercicio de sus funciones legales o por orden judicial; 3) A los terceros que autorice como Titular o por la Ley. 
Declaro que conozco que en cualquier momento puedo solicitar el acceso, la rectificación, la cancelación u oposición respecto al manejo de mis datos personales, en este sentido podré radicar solicitud directamente en la Agencia o ingresando a la página web <a href="https://www.sapiencia.gov.co" >www.sapiencia.gov.co<a> en la opción contáctenos o escribiendo al correo electrónico info@sapiencia.gov,co o comunicándome al teléfono en Medellín (+574) 4447947




            <br><br>                   
        </div>

        <div class="alert alert-success ">
        Cuando envíe este formulario, el propietario verá su nombre y dirección de correo electrónico.
            <br><br>
                   
        </div>
        <div class="text-center pt-4 pb-4"> 
            <label><b>CUESTIONARIO INTERÉS PROGRAMAS SAPIENCIA</b></label>
        </div>


        <!-- INFORMACION USUARIO-->


            <div class="row g-3 was-validated"> 
                <label for="validationServer04" class="form-label">Nombres y apellidos completos</label>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Nombre 1" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="nombre1" name="nombre1" value="" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " placeholder="Nombre 2" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="nombre2"  name="nombre2" value="" >
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " placeholder="Apellido 1" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="apellido1" name="apellido1"  value="" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " placeholder="Apellido 2" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="apellido2" name="apellido2"  value="" >
                </div>
           


            <div class="col-md-6" >
                <label for="validationServer04" class="form-label">Documento de identidad:</label>
                <select class="form-control form-control-sm" id="tipodocumento" name="tipodocumento" aria-describedby="validationServer04Feedback" required="">
                {!! $t1_tipo_documento !!}
              </select>
            </div>
            <div class="col-md-6" id="documentodiv" >
            <label for="validationServer04" class="form-label">Número de documento:</label>
            <input type="text" class="form-control form-control-sm "  name="documento"  id="documento" value="" required placeholder="Documento">
          </div>

          <div class="col-md-4" id="documentodiv" >
                <label for="validationServer04" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control form-control-sm " style="text-transform: uppercase;" name="correo"  id="correo" value="" required>
            </div>

            <div class="col-md-4">
                    <label for="validationServer04" class="form-label">Número de contacto telefónico:</label>
                    <input type="number" class="form-control form-control-sm" 
                    placeholder="telefono" style="text-transform: uppercase;" 
                    onkeypress="return soloLetras(event)"  
                    id="telefono" name="telefono" value="" 
                    required  pattern="\d{10,}" 
                    minlength="10"
                    maxlength="15" 
                    title="Debe ingresar mínimo 10 números">
                </div>


            
            <div class="col-md-4" >
                <label for="validationServer04" class="form-label">¿Conocía SAPIENCIA?</label>
                <select class="form-control form-control-sm" id="conocia_sapiencia" name="conocia_sapiencia" aria-describedby="validationServer04Feedback" required="">
                {!! $t1_sino !!}  
              </select>
            </div>

            <div class="col-md-4" >
                <label for="validationServer04" class="form-label">¿Cómo se enteró de SAPIENCIA?</label>
                <select class="form-control form-control-sm" id="como_se_entero" name="como_se_entero" aria-describedby="validationServer04Feedback" required="">
                {!! $t1_como_se_entero_sapiencia !!}
              </select>
            </div>

            
            <div class="col-md-4" style="display:none" id="otra_cualdiv">
                    <label for="validationServer04" class="form-label">¿Cual?</label>
                    <input type="text" class="form-control form-control-sm" placeholder="¿cual?" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="otra_cual" name="otra_cual" value="" required>
            </div>
<hr>

            <div class="d-flex justify-content-center align-items-center flex-column " style="min-height: 50vh;" >
                    <label class="mb-2 fw-bold">Programa en el que se encuentra interesado y desea recibir información de apertura de convocatorias</label>
                    <p><strong>Seleccione como máximo 5 opciones.</strong></p>

                    <div class="d-flex flex-column">
                        <div class="form-check form-switch d-flex align-items-center">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="matricula_cero" name="matricula_cero"  value="NO" required>
                            <label class="form-check-label ms-2" for="matricula_cero">Matrícula Cero (Universidades Públicas)</label>
                        </div>
                        
                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="medellin_virtual" name="medellin_virtual"  value="NO" required>
                            <label class="form-check-label ms-2" for="medellin_virtual">Cursos gratuitos y virtuales @Medellín</label>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="estudia" name="estudia"  value="NO" required>
                            <label class="form-check-label ms-2" for="estudia">Programa ESTUDIA Cursos cortos certificados (Industrias Creativas, del entretenimiento y Cuarta revolución industrial)</label>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="fondos_sapiencia_pregrado" name="fondos_sapiencia_pregrado"  value="NO" required>
                            <label class="form-check-label ms-2" for="fondos_sapiencia_pregrado">Fondos Sapiencia Pregrados </label>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="fondos_sapiencia_postgrado" name="fondos_sapiencia_postgrado"  value="NO" required>
                            <label class="form-check-label ms-2" for="fondos_sapiencia_postgrado">Fondos Sapiencia Posgrados </label>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="bilinguismo" name="bilinguismo" value="NO" required>
                            <label class="form-check-label ms-2" for="bilinguismo">Programa Bilingüismo</label>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center pt-2">
                            <input type="checkbox" class="form-check-input programa-checkbox" id="premios_medellin_investiga" name="premios_medellin_investiga"  value="NO" required>
                            <label class="form-check-label ms-2" for="premios_medellin_investiga">Premios Medellín Investiga</label>
                        </div>
                    </div>
                </div>


    </div>
    <br>

     
        
    </div>

            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                    <!-- <div class="btn btn-outline-primary" id="siguiente" style="display:none">Siguiente</div> -->
            </div>
        </div>
    </div>
    </form>
</div>  

<!-- jQuery desde Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

function guardarFormulario(event) {
    event.preventDefault(); // Evita la recarga de la página

    const form = document.getElementById('Formulariointeresprogramas');
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

      // Validar que al menos un switch (checkbox) esté seleccionado
      const checkboxes = document.querySelectorAll(".programa-checkbox");
    const seleccionados = Array.from(checkboxes).filter(cb => cb.checked).length;

    if (seleccionados === 0) {
        mostrarAlerta("Advertencia", "Debe seleccionar al menos un programa de interés.", "warning");
        return;
    }

      // 🚨 Validar el número de teléfono (mínimo 10 dígitos)
      let telefono = document.getElementById('telefono');
    if (telefono.value.length < 10 || isNaN(telefono.value)) {
        mostrarAlerta("Advertencia", "El telefóno debe incluir 10 numeros, Si es número fijo agregar indicativo, ejemplo 604.", "warning");
        telefono.classList.add("is-invalid");
        return;
    } else {
        telefono.classList.remove("is-invalid");
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
    fetch('./formulario/guardar', { // 🔗 Ajusta la ruta según tu Laravel
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Formulario guardado:', data);
        mostrarAlertaReload("Guardado", "Formulario guardado con éxito.", "success");
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

$('#como_se_entero').change(function(){
    if($('#como_se_entero').val() == '10'){
        $('#otra_cualdiv').show();
        $('#otra_cual').attr('required','required');
        //$('#otra_cualdiv').css('display','');
        $('#otra_cual').val('');
   }else{
        $('#otra_cualdiv').hide();
        $('#otra_cual').removeAttr('required');
       // $('#otra_cualdiv').css('display','none');
        $('#otra_cual').val('N/A');
   }
})


document.addEventListener("DOMContentLoaded", function () {

    // Seleccionar todos los checkboxes con la clase "programa-checkbox"
    const checkboxes = document.querySelectorAll(".programa-checkbox");

    checkboxes.forEach(checkbox => {
        // Evento para cambiar el valor cuando se marque o desmarque
        checkbox.addEventListener("change", function () {
            this.value = this.checked ? "SI" : "NO";
        });
    });
});

const checkboxes = document.querySelectorAll(".programa-checkbox");

    function validarCheckboxes() {
        const seleccionados = document.querySelectorAll(".programa-checkbox:checked").length;
        
        checkboxes.forEach(cb => {
            if (seleccionados === 0) {
                cb.setAttribute("required", "required"); // ❌ Muestra error si no hay seleccionados
            } else {
                cb.removeAttribute("required"); // ✅ Quita error si al menos uno está seleccionado
            }
        });
    }

    // Ejecutar validación al cambiar cualquier checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            validarCheckboxes();
        });
    });

    // Validar cuando se precargan los datos desde la cédula
    document.getElementById('documento').addEventListener('blur', function () {
        setTimeout(validarCheckboxes, 500); // Espera un poco para que cargue bien la info
    });


document.getElementById('documento').addEventListener('blur', function () {

    const checkboxes = document.querySelectorAll(".programa-checkbox");

function validarSeleccion() {
    const seleccionados = document.querySelectorAll(".programa-checkbox:checked").length;

    checkboxes.forEach(cb => {
        if (seleccionados >= 5 && !cb.checked) {
            cb.disabled = true; // ❌ Deshabilita los que no están seleccionados
        } else {
            cb.disabled = false; // ✅ Habilita si hay menos de 5 seleccionados
        }
    });
}

checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", function () {
        validarSeleccion(); // ✅ Llamar validación después de cada cambio
        this.value = this.checked ? "SI" : "NO";
    });
});

    let documento = this.value.trim(); // Obtener el valor sin espacios

    if (documento !== '') {
        fetch(`./formulario/buscar/${documento}`, { // 📌 Ajusta la URL según tu backend
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.existe) {
                // Precargar solo los datos que existan, convirtiéndolos a mayúsculas
                if (data.nombre1) document.getElementById('nombre1').value = data.nombre1.toUpperCase();
                if (data.nombre2) document.getElementById('nombre2').value = data.nombre2.toUpperCase();
                if (data.apellido1) document.getElementById('apellido1').value = data.apellido1.toUpperCase();
                if (data.apellido2) document.getElementById('apellido2').value = data.apellido2.toUpperCase();
                if (data.tipodocumento) document.getElementById('tipodocumento').value = data.tipodocumento;
                if (data.correo) document.getElementById('correo').value = data.correo.toUpperCase();
                if (data.telefono) document.getElementById('telefono').value = data.telefono;
                if (data.conocia_sapiencia) document.getElementById('conocia_sapiencia').value = data.conocia_sapiencia;
                if (data.como_se_entero) document.getElementById('como_se_entero').value = data.como_se_entero;
                if (data.otra_cual) document.getElementById('otra_cual').value = data.otra_cual.toUpperCase();



                if($('#como_se_entero').val() == '10'){
                            $('#otra_cualdiv').show();
                            $('#otra_cual').attr('required','required');
                            //$('#otra_cualdiv').css('display','');
                        //    $('#otra_cual').val('');
                    }else{
                            $('#otra_cualdiv').hide();
                            $('#otra_cual').removeAttr('required');
                        // $('#otra_cualdiv').css('display','none');
                            $('#otra_cual').val('N/A');
                    }

                // Precargar los checkboxes (SI o NO)
                let checkboxes = [
                    'matricula_cero', 'medellin_virtual', 'estudia', 
                    'fondos_sapiencia_pregrado', 'fondos_sapiencia_postgrado',
                    'bilinguismo', 'premios_medellin_investiga'
                ];
                
                checkboxes.forEach(id => {
                    if (data[id] !== undefined) {
                        document.getElementById(id).checked = (data[id] === "SI");
                        document.getElementById(id).value = (data[id] === "SI") ? "SI" : "NO";
                    }
                });
                validarSeleccion();
            } else {
                console.log("El documento no existe en la base de datos.");
            }
        })
        .catch(error => console.error('Error:', error));
    }
});




    </script>
    
</body>
</html>
