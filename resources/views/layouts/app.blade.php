<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Unidad Familia Medellín</title>

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
                <ul class="list-group list-group-flush" style="width: 250px; background-color: #2fa4e7 !important">
                    <li class="list-group-item" style="background-color: #2fa4e7 !important">
                        <a href="{{ url('/home') }}" class="text-decoration-none text-white">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <!-- <li class="list-group-item" style="background-color: #2fa4e7 !important">
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
                    @if(Auth::check() && Auth::user()->rol == 23) 
                    <li class="list-group-item" style="background-color: #2fa4e7 !important">
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

                        @endif

                        <li class="list-group-item" style="background-color: #2fa4e7 !important">
                        <a href="#submenu2" data-bs-toggle="collapse" aria-expanded="false" class="text-decoration-none text-white">
                            <i class="bi bi-people"></i> Crear Reuniones
                        </a>
                        <ul class="collapse list-unstyled mt-2 ps-3" id="submenu2">
                            <li>
                                <a href="{{ route('formularioeventos.index') }}" class="text-decoration-none text-white">
                                    <i class="bi bi-list"></i> Crear Reunión
                                </a>
                            </li>
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


                        <!-- <li class="list-group-item" style="background-color: #2fa4e7 !important">
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
            <div class="text-center py-3 border-top" style="background-color: #2fa4e7 !important; color: white;">
                @auth
                    <div>
                        <span style="font-size: 14px; font-weight: bold;">
                            <i class="bi bi-person-circle"></i> Usuario: {{ Auth::user()->name }}
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success" style="background:#2fa4e7 !important">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </button>
                        </form>
                    </div>
                @else
                    <div>
                    <a href="{{ url('/login') }}" class="text-decoration-none text-white">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                        </a> |
                        <a href="{{ url('/register') }}" class="text-decoration-none text-white">
                            <i class="bi bi-pencil-square"></i> Registrarse
                        </a>

                    </div>
                @endauth
            </div>
        </nav>

        <!-- Page Content -->
        <div class="flex-grow-1 bg-light">
        <nav class="navbar navbar-light bg-white border-bottom shadow-sm py-3" style="width: 97%;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <button class="btn btn-primary me-3" style="background:#2fa4e7; border:none" id="sidebarToggle">☰</button>
        <div class="text-center">
            @auth
                <p class="mb-0">Bienvenido, <strong>{{ Auth::user()->name }}</strong> 👋</p>
            @else
                <p class="mb-0">Bienvenido al sistema</p>
            @endauth
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
