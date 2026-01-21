<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Asistencia</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        @page {
            margin: 2cm 1.5cm 1.5cm 1.5cm;
        }
        .titulo {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .tabla-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .tabla-info td {
            border: 1px solid black;
            padding: 5px;
        }
        .tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .tabla th, .tabla td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        .tabla th {
            background-color: #e6e6e6;
            font-weight: bold;
        }
        .firma {
            height: 40px;
        }
        .pie {
            font-size: 10px;
            margin-top: 20px;
            text-align: justify;
        }
        .firmas {
            margin-top: 40px;
            text-align: center;
            width: 100%;
        }
        .firmas td {
            width: 50%;
            padding-top: 30px;
        }
        .firmas td span {
            display: block;
            border-top: 1px solid black;
            width: 80%;
            margin: 0 auto;
            padding-top: 5px;
        }
    </style>
</head>
<body>

<!-- 📌 ENCABEZADO DEL DOCUMENTO -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <tr>
        <!-- LOGO -->
        <td style="width: 20%; border: 1px solid black; text-align: center; padding: 5px;">
        <img src="{{ asset('imagenes/logo_sap_2.png') }}" alt="Logo Sapiencia" style="height: 50px;">

        </td>

        <!-- FORMATO -->
        <td style="width: 50%; border: 1px solid black; text-align: center; font-weight: bold; font-size: 14px;">
            FORMATO
        </td>

        <!-- FORMATO / VERSIÓN / PÁGINA -->
        <td style="width: 30%; border: 1px solid black; text-align: left; font-size: 12px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="border-bottom: 1px solid black;">F-AP-GA-004</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid black;">Versión: 01</td>
                </tr>
                <tr>
                <td>Página 1 de {{ $datos['totalPaginas'] }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- 📌 TÍTULO -->
<table style="width: 100%;border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; border-collapse: collapse;">
    <tr>
        <td style="text-align: center; font-weight: bold; padding: 5px; font-size: 14px;">
            LISTADO DE ASISTENCIA
        </td>
    </tr>
</table>

<br>

<table style="border-collapse: collapse; width: 100%; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
    <tr>
        <td style="border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; padding: 8px;">
            <strong>TEMA:</strong> {{$datos['titulo']}}
        </td>
    </tr>
</table>




    <table class="tabla-info">
        <tr>
            <td><strong>FECHA:</strong> {{$datos['fecha']}}</td>
            <td><strong>HORARIO:</strong> {{$datos['horaInicio']}} a {{$datos['horaFin']}}</td>
        </tr>
        <tr>
            <td><strong>LUGAR:</strong> {{$datos['contenido']}}</td>
            <td><strong>RESPONSABLE:</strong> {{$datos['organizador']}}</td>
        </tr>
    </table>

    <table class="tabla">
        <thead>
            <tr>
                <th>No.</th>
                <th>NOMBRE</th>
                <th>ORGANIZACIÓN Y CARGO</th>
                <th>CORREO ELECTRÓNICO</th>
                <th>TELÉFONO</th>
                <th>FIRMA</th>
            </tr>
        </thead>
        <tbody>
    @php $totalRegistros = count($integrante); @endphp

    @foreach($integrante as $index => $asistente)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $asistente->nombre1 }} {{ $asistente->nombre2 }} {{ $asistente->apellido1 }} {{ $asistente->apellido2 }}</td>
            <td>{{ $asistente->cargo }}</td>
            <td>{{ $asistente->correo }}</td>
            <td>{{ $asistente->telefono }}</td>
            <td class="firma">
                @if(!empty($asistente->firma))
                    <img src="{{ asset('firma/' . $asistente->firma) }}" width="100">
                @endif
            </td>
        </tr>
    @endforeach

    {{-- 🔹 Agregar filas vacías hasta llegar a 25 --}}
    <!-- @for ($i = $totalRegistros + 1; $i <= 25; $i++)
        <tr>
            <td>{{ $i }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="firma"></td>
        </tr>
    @endfor -->
</tbody>

    </table>

    <br>

<!-- 📌 SECCIÓN ADICIONAL (CUADROS FINALES) -->
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <tr>
        <td style="width: 50%; font-weight:bold; border: 1px solid black; padding: 5px;">Elaboró: Profesional Universitario de Apoyo Administrativo</td>
        <td style="width: 50%; border: 1px solid black; padding: 5px;">Revisó: Subdirector - Administrativa, Financiera y de Apoyo a la Gestión</td>
        <td style="width: 50%; border: 1px solid black; padding: 5px;">Aprobó: Subdirector - Administrativa, Financiera y de Apoyo a la Gestión</td>

    </tr>
    <tr>
        <td style="width: 50%;  border: 1px solid black; padding: 5px;">Fecha: 10 de mayo de 2018</td>
        <td style="width: 50%;  border: 1px solid black; padding: 5px;">Fecha: 10 de mayo de 2018</td>
        <td style="width: 50%;  border: 1px solid black; padding: 5px;">Fecha: 10 de mayo de 2018</td>
    </tr>
  
</table>



<!-- 📌 AVISO LEGAL -->
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
<tr>
        <td style="font-size: 10px; text-align: justify; padding: 5px;">
            Con la firma del presente formato usted autoriza a Sapiencia para que utilice la información consignada en el mismo con fines estadísticos y/o académicos. En cumplimiento del artículo 7 del Decreto 1377 de 2013, por medio del cual se reglamenta la Ley 1581 de 2012 en la que expidió el régimen general de la protección de datos personales.
        </td>
    </tr>
</table>

</body>
</html>
