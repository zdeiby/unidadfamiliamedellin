@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center pt-3">
        <h5 class="mb-4">CREAR NUEVO EVENTO</h5>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('events.store') }}" class="was-validated">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tema:</label>
            <input type="text" name="name" class="form-control form-control-sm" required>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Fecha:</label>
                <input type="date" name="start_date" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Hora inicio:</label>
                <input type="time" name="start_time" class="form-control form-control-sm" required>
            </div>
            
            <div class="col-md-4 mb-3">
                <label class="form-label">Hora fin:</label>
                <input type="time" name="end_time" class="form-control form-control-sm"required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Lugar:</label>
                <input type="text" name="manager" class="form-control form-control-sm" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Responsable:</label>
                <input type="text" name="organizer" class="form-control form-control-sm" required value="{{ Auth::user()->name }}" readOnly>
            </div>

            
        </div>

          {{-- Tipo de reunión --}}
                <div class="col-md-2 mb-3">
                    <label class="form-label">Tipo de reunión:</label>
                    <select name="tipo_reunion_id" class="form-select form-select-sm" required>
                            <option value="{{ $tipo->id }}">
                                {! $t1_tipo_reunion !}
                            </option>
                    </select>
                </div>

                {{-- Modalidad --}}
                <div class="col-md-2 mb-3">
                    <label class="form-label">Modalidad:</label>
                    <select name="modalidad_id" class="form-select form-select-sm" required>
                            <option value="{{ $modalidad->id }}">
                                {! $t1_modalidad !}
                            </option>
                    </select>
                </div>
            </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" style=" border:none">Guardar</button>
        </div>
    </form>

    <hr class="my-4">

    <h5 class="text-center">LISTADO DE EVENTOS</h5>
    <div class="table-responsive">
    <table id="eventsTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">Acciones</th>
                <th>ID</th>
                <th>Tema</th>
                <th>Asistentes</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Lugar</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $event)
            <tr>
                <td class="text-wrap" style="cursor:pointer">
                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 1.2rem;" onclick="openPDF('{{ $event->qr_token }}')"></i>
                    <i class="bi bi-qr-code" style="font-size: 1.2rem;"    
                        data-bs-toggle="modal" 
                        data-bs-target="#qrModal"  
                        onclick="showQRCode('{{ $event->qr_token }}')">
                </td>
                <td class="text-wrap">{{ $event->id }}</td>
                <td class="text-wrap">{{ $event->name }}</td>

                <td class="text-wrap">{{ $event->asistentes->count() }}</td>

                <td class="text-wrap">{{ date('d/m/Y', strtotime($event->start_date)) }}</td>
                <td class="text-wrap">{{ date('h:i A', strtotime($event->start_time)) }}</td>
                <td class="text-wrap">{{ $event->end_time ? date('h:i A', strtotime($event->end_time)) : 'N/A' }}</td>
                <td class="text-wrap">{{ $event->manager }}</td>
                <td class="text-wrap">{{ $event->organizer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Código QR del Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center">
                <div id="qrCodeContainer"></div> <!-- Aquí se mostrará el QR -->
                <hr>
                <input id="qrInput" type="text" class="form-control text-center" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    if ($.fn.DataTable.isDataTable('#eventsTable')) {
        $('#eventsTable').DataTable().destroy();
    }

    $('#eventsTable').DataTable({
        "order": [[0, "desc"]],
        "pageLength": 10,
        "language": {
            "search": "Buscar:",
            "paginate": {"first": "Primero", "last": "Último", "next": "Siguiente", "previous": "Anterior"}
        }
    });
});
</script>

<script>
    // function showQRCode(eventId) {
    //     let url = `./evento/qr/${eventId}`;

    //     fetch(url, {
    //         method: 'GET',
    //         headers: {
    //             'X-Requested-With': 'XMLHttpRequest' // Indicar que es una solicitud AJAX
    //         }
    //     })
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error(`Error HTTP: ${response.status}`);
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         document.getElementById("qrCodeImage").src = "data:image/png;base64," + data.qrCode;
    //         document.getElementById("qrLink").href = data.url;
    //     })
    //     .catch(error => {
    //         console.error("Error al generar el QR:", error);
    //     });
    // }

    function showQRCode(eventId) {
    let url = `./evento/qr/${eventId}`;

    fetch(url, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest' // Indicar que es una solicitud AJAX
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Insertar el SVG directamente en el HTML
        document.getElementById("qrCodeContainer").innerHTML = atob(data.qrCode);

        // Agregar el link al evento
        document.getElementById("qrInput").value = data.url;
    })
    .catch(error => {
        console.error("Error al generar el QR:", error);
    });
}

</script>

<script>
    function openPDF(qrToken) {
        if (qrToken) {
            let url = `pdf/ver/${qrToken}`;
            window.open(url, 'PDFWindow', 'width=900,height=600,scrollbars=yes,resizable=yes'); 
        } else {
            alert("No se encontró el QR Token para este evento."); // ⚠️ Mensaje de error si no hay QR
        }
    }
</script>




@endsection
