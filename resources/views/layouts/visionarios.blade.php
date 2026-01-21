<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SAPIENCIA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
    body {
    font-family: 'Poppins';
  
}
</style>

</head>
<body>


    
    <div class="d-flex" style="height: 100vh; overflow: hidden;overflow-x: auto; overflow-y: auto; ">
        <!-- Sidebar -->
        <nav class="d-flex flex-column justify-content-between" style="width: 250px;">
            <div>
                <div class="sidebar-header text-center py-4">
                    <img src="{{ asset('/imagenes/logo-sapiencia-alc.png') }}" alt="Logo" style="max-width: 80%;">
                </div>
              <!--  <ul class="list-group list-group-flush" style="width: 250px; background-color: #663398 !important">
                    <li class="list-group-item" style="background-color: #663398 !important">
                        <a href="{{route('visionarios.caracterizacion')}}" class="text-decoration-none text-white">
                            <i class="bi bi-house-door"></i> Caracterización
                        </a>
                    </li>
                    <li class="list-group-item" style="background-color: #663398 !important; display:none" id="condicionesvulnerabilidad">
                        <a href="{{route('visionarios.criteriosdepriorizacion')}}" class="text-decoration-none text-white">
                            <i class="bi bi-file-earmark-text"></i>  Condiciónes de vulnerabilidad
                        </a>
                    </li>
                     <li class="list-group-item" style="background-color: #663398 !important;display:none" id="distincionessociales">
                        <a href="{{route('visionarios.distincionessociales')}}" class="text-decoration-none text-white">
                            <i class="bi-star-fill"></i> Distinciones Sociales
                        </a>
                    </li>
                    <li class="list-group-item" style="background-color: #663398 !important;display:none" id="certificacionesadicionales">
                        <a href="{{route('visionarios.certificacionesadicionales')}}" class="text-decoration-none text-white">
                            <i class="bi bi-graph-up"></i> Certificaciones Adicionales
                        </a>
                    </li>  -->
                    
                    
                    <!-- <li class="list-group-item" style="background-color: #663398 !important;display:none">
                        <a href="#submenu1" data-bs-toggle="collapse" aria-expanded="false" class="text-decoration-none text-white">
                            <i class="bi bi-graph-up"></i> Reportes
                        </a>
                        <ul class="collapse list-unstyled mt-2 ps-3" id="submenu1">
                            <li>
                                <a href="#" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Reporte 1
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Reporte 2
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="list-group-item" style="background-color: #663398 !important">
                        <a href="#submenu1" data-bs-toggle="collapse" aria-expanded="false" class="text-decoration-none text-white">
                            <i class="bi bi-graph-up"></i> Gestión Usuarios
                        </a>
                        <ul class="collapse list-unstyled mt-2 ps-3" id="submenu1">
                            <li>
                                <a href="{{ route('users.index') }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Lista Usuarios
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}" class="text-decoration-none text-white">
                                    <i class="bi bi-person-plus"></i> Crear Usuario
                                </a>
                            </li>
                        </ul>
                        </li>

                        <li class="list-group-item" style="background-color: #663398 !important">
                        <a href="#submenu2" data-bs-toggle="collapse" aria-expanded="false" class="text-decoration-none text-white">
                            <i class="bi bi-people"></i> Crear Reuniones
                        </a>
                        <ul class="collapse list-unstyled mt-2 ps-3" id="submenu2">
                            <li>
                                <a href="{{ route('formularioeventos.index') }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Crear Reunión
                                </a>
                            </li> -->
                            <!-- <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/tabla')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Ver reuniones
                                </a>
                            </li>
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/formulario')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Crear idea de proyecto
                                </a>
                            </li> -->
                            <!-- <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/crearcriterioiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Crear Criterio IAG
                                </a>
                            </li>
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/tablacriterioiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Tabla Criterios IAG
                                </a>
                            </li> -->
                        </ul>
                        </li>


                        <!-- <li class="list-group-item" style="background-color: #663398 !important">
                        <a href="#submenu3" data-bs-toggle="collapse" aria-expanded="false" class="text-decoration-none text-white">
                            <i class="bi bi-people"></i> Criterio IAG
                        </a>
                        <ul class="collapse list-unstyled mt-2 ps-3" id="submenu3">
                           
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/formularioiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Crear Nombre Proyecto Estrategico
                                </a>
                            </li>
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/tablaproyectoestrategicoiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-eye"></i> Ver Nombre Proyecto Estrategico
                                </a>
                            </li>
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/crearcriterioiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-file-earmark-text"></i> Crear Criterio IAG
                                </a>
                            </li>
                            <li>
                                <a href="{{  url('../../seguimientodpl_frontend/public/tablacriterioiag')  }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Tabla Criterios IAG
                                </a>
                            </li> -->
                        </ul>
                        </li>

                </ul>
            </div>

            <!-- Footer -->
            <div class="text-center py-3 border-top" style="background-color: #663398 !important; color: white;">
            
                    <div>
                    @if(session()->has('usuario_externo'))
                        <span style="font-size: 14px; font-weight: bold;">
                            <i class="bi bi-person-circle"></i> Usuario:  {{ optional(session('usuario_externo'))['nombres'] }}
                        </span>
                        <br>
                    @endif
                        <!-- <a href="{{ url('https://fondos.sapiencia.gov.co/convocatorias/acceso/index.php/Acceso_controller/fc_cargarvista?id=37&id_ruta=205') }}" class="text-decoration-none text-white">
                            <i class="bi bi-box-arrow-right"></i>  Cerrar Sesión
                        </a>  -->
                        <a href="{{ route('logoutvisionarios') }}" class="text-decoration-none text-white">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </a>

                        <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success" style="background:#663398 !important">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </button>
                        </form> -->
                    </div>
               
            </div>
        </nav>

        <!-- Page Content -->
        <div class="flex-grow-1 bg-light">
        <nav class="navbar navbar-light bg-white border-bottom shadow-sm py-3" style="width: 97%;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <button class="btn btn-primary me-3" style="background:#663398; border:none" id="sidebarToggle">☰</button>
        <div class="text-center">
        @if(session()->has('usuario_externo'))
            <p class="mb-0">Bienvenido al sistema <b>{{ optional(session('usuario_externo'))['nombres'] }}</b> 👋</p>
        @else
            <p class="mb-0">Bienvenido al sistema 👋</p>
        @endif
                
         
        </div>
    </div>
</nav>
        <main class="container pt-2" style="width: 95%; overflow-x: auto; overflow-y: auto; max-height: 87vh;">
            @yield('content')
        </main>
            
        </div>
    </div>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTable JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>





 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        // Toggle Sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.querySelector('nav').classList.toggle('d-none');
        });
    </script>

    <script>
  $(document).ready(function () {
    $('.selectpicker').selectpicker();
});


function soloLetras(event) {
    var key = event.key;
    var regex = /^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]$/;

    if (!regex.test(key)) {
        event.preventDefault(); // Bloquea la tecla si no es válida
    }
}

function soloNumeros(event) {
    var input = event.target; // Captura el input donde se está escribiendo
    var key = event.key;
    var regex = /^[0-9]$/;

    // Verifica si la tecla es un número (0-9)
    if (!regex.test(key)) {
        event.preventDefault(); // Bloquea la tecla si no es un número
    }

    // Limita la cantidad de caracteres a 10
    if (input.value.length >= 10) {
        event.preventDefault();
    }
}

function validarcorreo(input) {
    var correo = $(input).val().trim(); // Captura el valor del input

    if (correo.length > 0) {
        var hasAtSymbol = correo.includes('@');
        var hasDotSymbol = correo.includes('.');

        if (!hasAtSymbol || !hasDotSymbol) {
            Swal.fire({
                icon: 'info',
                title: '¡Correo electrónico incorrecto!',
                text: 'Debe contener "." y "@".',
                showConfirmButton: false,
                timer: 1500
            });
            $(input).focus();
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var today = new Date();

    // Calculamos la fecha mínima (15 años atrás)
    var minDate = new Date();
    minDate.setFullYear(today.getFullYear() - 100); // Permite solo desde hace 100 años hasta la fecha actual

    // Calculamos la fecha máxima (hoy)
    var maxDate = new Date();
    maxDate.setFullYear(today.getFullYear() - 15); // Permite solo si tiene 15 años o más

    // Convertimos a formato YYYY-MM-DD
    var minDateFormatted = minDate.toISOString().split("T")[0];
    var maxDateFormatted = maxDate.toISOString().split("T")[0];

    // Asignamos límites al input
    document.getElementById("fecha_nacimiento").setAttribute("min", minDateFormatted);
    document.getElementById("fecha_nacimiento").setAttribute("max", maxDateFormatted);
});

function validarFechaNacimiento() {
    var fechaInput = document.getElementById("fecha_nacimiento");
    var fechaSeleccionada = new Date(fechaInput.value);
    var fechaMinima = new Date();
    fechaMinima.setFullYear(new Date().getFullYear() - 100); // Fecha mínima: hace 100 años
    var fechaMaxima = new Date();
    fechaMaxima.setFullYear(new Date().getFullYear() - 15); // Fecha máxima: hace 15 años

    if (fechaSeleccionada < fechaMinima || fechaSeleccionada > fechaMaxima) {
        Swal.fire({
                icon: 'info',
                title: '¡Edad no cumple!',
                text: 'La edad debe estar entre 15 años en adelante.',
                showConfirmButton: false,
                timer: 1500
            });
       // alert("La fecha de nacimiento debe ser de hace 15 años en adelante y no mayor a hoy.");
        fechaInput.value = ""; // Borra la fecha incorrecta
        $('#edad').val('');
    }
}


function showToast(message) {
    toastr.options = {
        closeButton: false,
        progressBar: false,
        positionClass: "toast-bottom-center", // Ubicación en la parte inferior
        showDuration: 300,
        hideDuration: 1000,
        timeOut: 3000,
        extendedTimeOut: 1000,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    toastr.success(message);
}






// function soloNumeros(event) {
//     var key = event.key;
//     var regex = /^[0-9]$/;

//     // Verifica si la tecla es un número (0-9)
//     if (!regex.test(key)) {
//         event.preventDefault(); // Bloquea la tecla si no es un número
//     }
// }


    </script>

<!-- <script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function () {
        $('#usersTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            },
            pageLength: 10, // Número de filas por página
            responsive: true // Hacer la tabla responsiva
        });
    });
</script> -->
</body>
</html>
