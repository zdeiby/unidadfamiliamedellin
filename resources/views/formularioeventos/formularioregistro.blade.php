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
    </style>
</head>
<body >
<div class="container pt-2">
 <!-- <img width="100%"   src="{{ asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg') }}" alt="">  -->
<form id="formularioAutorizacion"  enctype="multipart/form-data">
@csrf
        <div class="text-center pt-4 pb-4">
            <label for=""><b>ASISTENCIA DE EVENTO: {{$nombre}}</b></label>
        </div>

            <div class="row g-3 was-validated"> 
                <label for="validationServer04" class="form-label">NOMBRES Y APELLIDOS COMPLETOS</label>
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

                <div class="col-md-6" id="documentodiv" >
                    <label for="validationServer04" class="form-label">NÚMERO DE DOCUMENTO:</label>
                    <input type="text" class="form-control form-control-sm "  name="documento"  id="documento" value="" required>
                </div>
                <div class="col-md-6" id="documentodiv" >
                    <label for="validationServer04" class="form-label">CORREO ELECTRONICO:</label>
                    <input type="email" placeholder="CORREO ELECTRÓNICO" class="form-control form-control-sm " style="text-transform: uppercase;" name="correo"  id="correo" value="" required>
                </div>
                <div class="col-md-6">
                    <label for="validationServer04" class="form-label">ORGANIZACIÓN Y CARGO:</label>
                    <input type="text" class="form-control form-control-sm" placeholder="CARGO" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="cargo" name="cargo" value="" required>
                </div>
                <div class="col-md-6" style="">
                    <label for="validationServer04" class="form-label">TELEFONO:</label>
                    <input type="text" class="form-control form-control-sm" placeholder="TELEFONO" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="telefono" name="telefono"  required>
                </div>
                <div class="col-md-12" style="display:none">
                    <label for="validationServer04" class="form-label">ORGANIZACIÓN Y CARGO:</label>
                    <input type="text" class="form-control form-control-sm" placeholder="CARGO" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="qr_token" name="qr_token" value="<?= $qr_token ?>" required>
                </div>
                


        
    </div>
    <br>


<!-- FIN INFORMACION -->

    <div class="container mt-4">
        <div class="text-center  pb-2">
            <label ><b>Firma Digital</b></label>
        </div>

        <div class="alert alert-info text-center">
            En el siguiente cuadro realiza la firma y cuando esté listo, oprime el botón <strong>Cargar Firma</strong>
        </div>

        <div class="text-center">
            <canvas id="draw-canvas"></canvas>
        </div>

        <div class="text-center mt-3">
            <div class="btn btn-primary" id="draw-submitBtn">Cargar Firma</div>
            <div class="btn btn-warning" id="draw-clearBtn">Limpiar Firma</div>
            <label>Color</label>
            <input type="color" id="color" value="#000000">
            <label>Tamaño Puntero</label>
            <input type="range" id="puntero" min="1" max="5" value="2">
        </div>
        <hr>

        <div class="alert alert-info text-center">
            <strong>Firma cargada</strong>
            </div>
                <!-- <div class="text-center container">
                    <img id="draw-image" src="" alt="Firma Cargada" width="100%" style="display: none;">
                </div> -->
                <div class="text-center container">
                    <div id="firma-container" class="firma-box">
                        <img id="draw-image" src="" alt="Firma Cargada" class="img-fluid">
                    </div>
                </div>

            </div>
            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                    <!-- <div class="btn btn-outline-primary" id="siguiente" style="display:none">Siguiente</div> -->
            </div>
        </div>
    </div>
    </form>
</div>   

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

document.addEventListener('DOMContentLoaded', function () {
    var canvas = document.getElementById("draw-canvas");
    var ctx = canvas.getContext("2d");

    // Ajustar tamaño del canvas dinámicamente
    canvas.width = canvas.offsetWidth;
    canvas.height = 200; 

    var drawImage = document.getElementById("draw-image");
    var clearBtn = document.getElementById("draw-clearBtn");
    var submitBtn = document.getElementById("draw-submitBtn");
    var colorPicker = document.getElementById("color");
    var puntero = document.getElementById("puntero");
    var firmaContainer = document.getElementById("firma-container");

    var drawing = false;
    var isCanvasSigned = false; // Variable para saber si se ha firmado
    var mousePos = { x: 0, y: 0 };
    var lastPos = mousePos;

    // 🖱 EVENTOS PARA ESCRITORIO (Mouse)
    canvas.addEventListener("mousedown", function (e) {
        drawing = true;
        lastPos = getMousePos(canvas, e);
    }, false);

    canvas.addEventListener("mouseup", function (e) {
        drawing = false;
    }, false);

    canvas.addEventListener("mousemove", function (e) {
        if (drawing) {
            isCanvasSigned = true; // Marca como firmado
            mousePos = getMousePos(canvas, e);
            renderCanvas();
        }
    }, false);

    // 📱 EVENTOS PARA MÓVILES (Touch)
    canvas.addEventListener("touchstart", function (e) {
        e.preventDefault(); // ❌ Evita el desplazamiento de la pantalla en móviles
        drawing = true;
        lastPos = getTouchPos(canvas, e);
    }, false);

    canvas.addEventListener("touchmove", function (e) {
        e.preventDefault(); // ❌ Evita el desplazamiento de la pantalla en móviles
        if (drawing) {
            isCanvasSigned = true;
            mousePos = getTouchPos(canvas, e);
            renderCanvas();
        }
    }, false);

    canvas.addEventListener("touchend", function (e) {
        drawing = false;
    }, false);

    function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        var scaleX = canvasDom.width / rect.width; // Normaliza ancho
        var scaleY = canvasDom.height / rect.height; // Normaliza alto

        return {
            x: (mouseEvent.clientX - rect.left) * scaleX,
            y: (mouseEvent.clientY - rect.top) * scaleY
        };
    }

    function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        var scaleX = canvasDom.width / rect.width; // Normaliza ancho
        var scaleY = canvasDom.height / rect.height; // Normaliza alto

        return {
            x: (touchEvent.touches[0].clientX - rect.left) * scaleX,
            y: (touchEvent.touches[0].clientY - rect.top) * scaleY
        };
    }

    function renderCanvas() {
        if (drawing) {
            ctx.strokeStyle = colorPicker.value;
            ctx.lineWidth = puntero.value;
            ctx.beginPath();
            ctx.moveTo(lastPos.x, lastPos.y);
            ctx.lineTo(mousePos.x, mousePos.y);
            ctx.stroke();
            ctx.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        isCanvasSigned = false; // Resetea el estado de firma
        drawImage.src = ""; // Borra la imagen
        drawImage.style.display = "none"; // Oculta la imagen
        firmaContainer.style.display = "none"; // Oculta el contenedor
    }

    function isCanvasBlank(canvas) {
        var blank = document.createElement("canvas");
        blank.width = canvas.width;
        blank.height = canvas.height;
        return canvas.toDataURL() === blank.toDataURL();
    }

    clearBtn.addEventListener("click", function () {
        clearCanvas();
    });

    submitBtn.addEventListener("click", function () {
        if (!isCanvasSigned || isCanvasBlank(canvas)) {
            mostrarAlerta("Advertencia", "No has realizado ninguna firma. Por favor, dibuja tu firma antes de cargar.", "warning");
            return;
        }

        var dataUrl = canvas.toDataURL();
        drawImage.src = dataUrl;
        drawImage.style.display = "block"; // Muestra la imagen cuando haya firma
        firmaContainer.style.display = "block"; // Muestra el cuadro de firma
    });

});

function mostrarAlerta(titulo, mensaje, tipo) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    });
}

function mostrarAlertaReload(titulo, mensaje, tipo) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
           // location.reload(); // 🔄 Recarga la página al hacer clic en "Aceptar"
            window.location.href = "https://unidadfamiliamedellin.com.co/";

        }
    });
}



function guardarFormulario(event) {
    event.preventDefault(); // Evita que el formulario se envíe normalmente

    const form = document.getElementById('formularioAutorizacion');
    const formData = new FormData(form);

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

    //  Capturar la firma en base64 desde el <img>
    const firmaBase64 = document.getElementById('draw-image').src;

    if (!firmaBase64 || firmaBase64 === "" || firmaBase64 === window.location.href) {
        mostrarAlerta("Advertencia", "Debes cargar una firma antes de guardar.", "warning");
        return;
    }


    if (firmaBase64.startsWith("data:image")) { 
        formData.append('firma', firmaBase64); // Adjunta la firma en base64
    }

    fetch("{{ route('registroevento.guardar') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.firma) {
            document.getElementById('draw-image').src = data.firma; // Muestra la firma guardada
        }

       mostrarAlertaReload("Guardado","Formulario guardado con éxito.","success");;

    })
    .catch(error => {
        console.error('Error:', error);
        mostrarAlerta("Error","Error al guardar el formulario, intenta de nuevo.","error");
    });
}


// document.getElementById('documento').addEventListener('blur', function () {
//     let documento = this.value.trim(); // Obtener el valor sin espacios

//     if (documento !== '') {
//         fetch(`formulario/buscar/${documento}`, { // 📌 Ajusta la URL según tu backend
//             method: 'GET',
//             headers: {
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             }
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.existe) {
//                 // Precargar solo los datos que existan, sin borrar los demás
//                 if (data.nombre1) document.getElementById('nombre1').value = data.nombre1;
//                 if (data.nombre2) document.getElementById('nombre2').value = data.nombre2;
//                 if (data.apellido1) document.getElementById('apellido1').value = data.apellido1;
//                 if (data.apellido2) document.getElementById('apellido2').value = data.apellido2;
//                 if (data.tipodocumento) document.getElementById('tipodocumento').value = data.tipodocumento;
//                 if (data.lugar_expedicion) document.getElementById('lugar_expedicion').value = data.lugar_expedicion;
//                 if (data.nombre_tutor) document.getElementById('nombre_tutor').value = data.nombre_tutor;
//                 if (data.tipodocumento_tutor) document.getElementById('tipodocumento_tutor').value = data.tipodocumento_tutor;
//                 if (data.documento_tutor) document.getElementById('documento_tutor').value = data.documento_tutor;
//                 if (data.lugar_expedicion_tutor) document.getElementById('lugar_expedicion_tutor').value = data.lugar_expedicion_tutor;
//                 if (data.fecha_diligenciamiento) document.getElementById('fecha_diligenciamiento').value = data.fecha_diligenciamiento;
//                 if (data.correo) document.getElementById('correo').value = data.correo;
//                 if (data.autorizacion) document.getElementById('autorizacion').value = data.autorizacion;

//                 // Mostrar la firma si existe
//                 if (data.firma) {
//                     let firmaImage = document.getElementById('draw-image');
//                     firmaImage.src = "{{ asset('firma') }}"+`/${data.firma}`;
//                     firmaImage.style.display = "block"; 
//                 }
//             } else {
//                 // ⚠ No borrar los campos si no existe, solo mostrar un mensaje
//                 console.log("El documento no existe en la base de datos.");
//             }
//         })
//         .catch(error => console.error('Error:', error));
//     }
// });




    </script>
</body>
</html>
