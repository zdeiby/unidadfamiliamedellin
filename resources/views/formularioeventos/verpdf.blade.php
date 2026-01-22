<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FO-GINF Asistencia</title>
    <style>
        *{ font-family: Arial, sans-serif; font-size: 10px; }
        @page { margin: 90px 18px 22px 18px; } /* deja espacio para header fijo */

        /* ===== Header fijo (Dompdf) ===== */
     </style>
</head>
<body>

<style>
    @page { margin: 95px 18px 22px 18px; }
    header { position: fixed; top: -75px; left: 0; right: 0; height: 75px; }
</style>

<header>
    <!-- Barra superior -->
    <div style="height:10px; background:#1aa0a8;"></div>

    <!-- Tabla principal del encabezado -->
    <table style="width:100%; border-collapse:collapse; border-left:1px solid #000; border-right:1px solid #000;">
        <tr>
            <!-- Columna izquierda (Cód / Versión) -->
            <td style="width:18%; padding:0; vertical-align:top; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="padding:6px; font-weight:bold; font-size:11px; text-align:left; border-bottom:1px solid #000;">
                            Cód. FO-GINF-076
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:6px; font-weight:bold; font-size:11px; text-align:left;">
                            Versión 9
                        </td>
                    </tr>
                </table>
            </td>

            <!-- Centro -->
            <td style="width:64%; padding:6px 8px; text-align:center; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                <div style="font-weight:bold; font-size:12px; line-height:1.1;">Formato</div>
                <div style="font-weight:bold; font-size:12px; color:#0e7f86; line-height:1.1;">
                    FO-GINF Asistencia a Reuniones, Eventos y Capacitaciones - Con autorización del Titular
                </div>
            </td>

            <!-- Derecha (vacía / paginado si quieres) -->

            <td style="width: 17%; border: 1px solid black; text-align: center; padding: 5px;">
        <img src="{{ asset('imagenes/logo_sap_2.png') }}" alt="Logo Sapiencia" style="height: 37px;">

        </td>
            <!-- <td style="width:18%; padding:6px 8px; text-align:right; border-top:1px solid #000; border-bottom:1px solid #000;">
                 Página 1 de X (opcional)
                 <span style="font-size:10px;">Página 1 de {{ $datos['totalPaginas'] ?? 1 }}</span>
            </td> -->
        </tr>
    </table>

    <!-- Barra inferior -->
    <div style="height:10px; background:#0e7f86;"></div>
</header>


{{-- ===== Bloque superior estilo FO-GINF (SIN CSS externo) ===== --}}
<table style="width:100%; border-collapse:collapse; font-family:Arial; font-size:10px;">
    {{-- FILA 1: Tema + Tipo Reunión (Capacitación/Seguimiento) + Modalidad (Presencial) --}}
    <tr>
        <td style="border:1px solid #000; width:10%; padding:4px; font-weight:bold;">Tema</td>
        <td style="border:1px solid #000; width:34%; padding:4px;">
            {{ $datos['titulo'] ?? '' }}
        </td>

        {{-- Columna título Tipo Reunión (ocupa 1 columna vertical) --}}
        <td rowspan="4" style="border:1px solid #000; width:8%; padding:4px; font-weight:bold; text-align:center;">
            Tipo de<br>Reunión
        </td>

        {{-- Tipo Reunión: 2 columnas (texto + checkbox) --}}
        <td style="border:1px solid #000; width:14%; padding:4px; font-weight:bold;">
            Capacitación
        </td>

        <td style="border:1px solid #000; width:4%; padding:4px; text-align:center;">
              @if(($datos['tipo_reunion'] ?? null) == 1)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>


        <!-- <td style="border:1px solid #000; width:14%; padding:4px; font-weight:bold;">Seguimiento</td>
        <td style="border:1px solid #000; width:4%; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? '')=='Seguimiento') ✓ @endif
        </td> -->
        <td style="border:1px solid #000; width:14%; padding:4px; font-weight:bold;">
            Seguimiento
        </td>

        <td style="border:1px solid #000; width:4%; padding:4px; text-align:center;">
           @if(($datos['tipo_reunion'] ?? null) == 5)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                ">
                    <!-- palito corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- palito largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                "></span>
            @endif
        </td>



        {{-- Columna título Modalidad Reunión --}}
        <td rowspan="4" style="border:1px solid #000; width:8%; padding:4px; font-weight:bold; text-align:center;">
            Modalidad<br>Reunión
        </td>

        <td style="border:1px solid #000; width:10%; padding:4px; font-weight:bold;">
            Presencial
        </td>

        <td style="border:1px solid #000; width:4%; padding:4px; text-align:center;">
           @if(($datos['modalidad_reunion'] ?? null) == 1)

                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>

    </tr>

    {{-- FILA 2: Dependencia + Organizador + Entrenamiento/Toma + Virtual --}}
    <tr>
        <td style="border:1px solid #000; padding:4px; font-weight:bold;">Dependencia</td>
        <td style="border:1px solid #000; padding:0;">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="border-right:1px solid #000; padding:4px;">
                        {{ $datos['dependencia'] ?? 'Secretaria de Inclusion Social y Familia' }}
                    </td>
                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:20%;">
                        Organizador
                    </td>
                    <td style="padding:4px;">
                       Despacho del secretario
                    </td>
                </tr>
            </table>
        </td>

        <td style="border:1px solid #000; padding:4px; font-weight:bold;">
            Entrenamiento
        </td>

        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? null) == 2)

                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>


        <td rowspan="2" style="border:1px solid #000; padding:4px; font-weight:bold;">
            Toma de decisiones
        </td>

        <td rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? null) == 6)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>


        <td style="border:1px solid #000; padding:4px; font-weight:bold;">
            Virtual
        </td>

        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['modalidad_reunion'] ?? null) == 2)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>

    </tr>

    {{-- FILA 3: Responsable + Departamento/Ciudad + Formación/Informativa + Mixta --}}
    <tr>
        <td style="border:1px solid #000; padding:4px; font-weight:bold;">Responsable</td>
        <td style="border:1px solid #000; padding:0;">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="border-right:1px solid #000; padding:4px;">
                         {{ $datos['organizador'] ?? '' }}
                    </td>
                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:20%;">
                        Departamento
                    </td>
                    <td style="border-right:1px solid #000; padding:4px;">
                        {{ $datos['departamento'] ?? 'Antioquia' }}
                    </td>
                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:14%;">
                        Ciudad
                    </td>
                    <td style="padding:4px;">
                        {{ $datos['ciudad'] ?? 'Medellín' }}
                    </td>
                </tr>
            </table>
        </td>

        <td style="border:1px solid #000; padding:4px; font-weight:bold;">
            Formación
        </td>

        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? null) == 3)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>


        <!-- <td style="border:1px solid #000; padding:4px; font-weight:bold;">Informativa</td>
        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo'] ?? '')=='Informativa') ✓ @endif
        </td> -->

        <td rowspan="2" style="border:1px solid #000; padding:4px; font-weight:bold;">
            Mixta
        </td>

        <td rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">
             @if(($datos['modalidad_reunion'] ?? null) == 3)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>
 
    </tr>

    {{-- FILA 4: (vacío a la izquierda para mantener grid) + Otra --}}
    

    {{-- FILA 5: Fecha + Lugar + Hora inicia + Hora termina (todo en una fila como el PDF) --}}
    <tr>
        <td style="border:1px solid #000; padding:4px; font-weight:bold;">Fecha</td>
        <td style="border:1px solid #000; padding:0;">
            <table style="width:100%; border-collapse:collapse;">
                <tr>
                    <td style="border-right:1px solid #000; padding:4px; width:18%;">
                        {{ $datos['fecha'] ?? '' }}
                    </td>

                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:10%;">Lugar</td>
                    <td style="border-right:1px solid #000; padding:4px; width:32%;">
                        {{ $datos['contenido'] ?? '' }}
                    </td>

                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:12%;">Hora inicia</td>
                    <td style="border-right:1px solid #000; padding:4px; width:10%;">
                        {{ $datos['horaInicio'] ?? '' }}
                    </td>

                    <td style="border-right:1px solid #000; padding:4px; font-weight:bold; width:12%;">Hora termina</td>
                    <td style="padding:4px; width:10%;">
                        {{ $datos['horaFin'] ?? '' }}
                    </td>
                </tr>
            </table>
        </td>

        {{-- Rellena columnas del grid (porque Tipo/Modalidad tienen rowspan=5) --}}
        <td style="border:1px solid #000; padding:4px; font-weight:bold;">
            Informativa
        </td>

        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? null) == 4)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>



        <td style="border:1px solid #000; padding:4px; font-weight:bold;">
            Otra
        </td>

        <td style="border:1px solid #000; padding:4px; text-align:center;">
            @if(($datos['tipo_reunion'] ?? null) == 7)
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    background:#0b66ff;
                    position:relative;
                    vertical-align:middle;
                ">
                    <!-- trazo corto -->
                    <span style="
                        position:absolute;
                        left:3px;
                        top:7px;
                        width:4px;
                        height:2px;
                        background:#fff;
                        transform:rotate(45deg);
                    "></span>

                    <!-- trazo largo -->
                    <span style="
                        position:absolute;
                        left:6px;
                        top:6px;
                        width:7px;
                        height:2px;
                        background:#fff;
                        transform:rotate(-45deg);
                    "></span>
                </span>
            @else
                <span style="
                    display:inline-block;
                    width:14px;
                    height:14px;
                    border:1px solid #000;
                    vertical-align:middle;
                "></span>
            @endif
        </td>

        <!-- <td  style="border:1px solid #000; padding:4px; font-weight:bold; width:12%;">&nbsp;Mixta</td>
        <td rowspan="2"style="border:1px solid #000; padding:4px;">&nbsp;</td> -->
    </tr>
</table>



{{-- ===== Aviso de privacidad ===== --}}
<table style="width:100%; border-collapse:collapse; font-family:Arial; font-size:10px; margin-top:8px;">
    <tr>
        <td style="border:1px solid #000; padding:6px 8px; text-align:justify; line-height:1.25;">
             <strong>AVISO DE PRIVACIDAD Y AUTORIZACIÓN:</strong>
    En cumplimiento de la Ley 1581 de 2012 y sus normas reglamentarias y complementarias
    <strong>autorizo al Distrito Especial de Ciencia, Tecnología e Innovación de Medellín</strong>
    identificado con NIT <strong>890.905.211-1</strong> y con domicilio en el Centro Administrativo
    Distrital (CAD), Calle 44 N° 52–165, y contacto en la Línea Única (+57) 6044444144, como
    <strong>Responsable</strong> para tratar mis datos personales conforme a su
    <strong>Política de Tratamiento de Datos Personales Decreto 0268 de 2025</strong>
    disponible en <strong>www.medellin.gov.co</strong>, con las finalidades:
    <strong>Registro de asistencia a eventos, reuniones o actividades institucionales;</strong>
    para comunicaciones, notificaciones o requerimientos relacionados con
    <strong>trámites administrativos del Distrito de Medellín</strong>.
    Con la presente autorización se <strong>recolectarán datos sensibles</strong> y entiendo que su
    entrega es facultativa y por lo tanto puedo <strong>abstenerme de suministrarlos</strong>,
    teniendo siempre presente el derecho a no responder este tipo de preguntas conforme a lo
    establecido en la Ley 1581 de 2012 y sus normas reglamentarias.

    La información personal suministrada podrá ser almacenada de forma segura en archivos o
    bases de datos del Distrito de Medellín para los fines indicados; <strong>también</strong>,
    podrá ser transmitida a terceros encargados del tratamiento, con quienes el Distrito tenga
    relación contractual o legal, para cumplir con las finalidades aquí descritas y las
    obligaciones legales del Distrito. En esa medida declaro que esta información es
    <strong>correcta, veraz, verificable y actualizada</strong> y podrá ser sometida a operaciones de
    <strong>recolección, almacenamiento, uso, circulación, indexación y/o analítica</strong>
    dentro del marco legal aplicable.
   
    He sido informado sobre mi derecho a <strong>conocer, consultar, actualizar, rectificar y suprimir</strong>
    mi información; acceder a ella de forma gratuita; solicitar prueba de esta autorización y
    revocarla; presentar quejas ante la <strong>Superintendencia de Industria y Comercio (SIC)</strong>,
    los que puedo ejercer gratuitamente a través de los canales de atención habilitados para
    el efecto, relacionados en la Política de Tratamiento de Datos Personales
    (<strong>Decreto 0268 de 2025</strong>), disponible en el portal web
    <strong>www.medellin.gov.co</strong>.

    <strong>MI AUTORIZACIÓN SE PERFECCIONA</strong> al momento de diligenciar y/o firmar el presente documento.
        </td>
    </tr>
</table>

<table style="width:100%; border-collapse:collapse; font-family:Arial; font-size:10px; margin-top:10px; table-layout:fixed;">
    <thead>
        <tr>
            <th style="border:1px solid #000; width:3%; padding:4px; text-align:center;">N°</th>
            <th style="border:1px solid #000; width:9%; padding:4px; text-align:center;">Tipo de<br>Documento</th>
            <th style="border:1px solid #000; width:6%; padding:4px; text-align:center;">Número de<br>Documento</th>
            <th style="border:1px solid #000; width:16%; padding:4px; text-align:center;">Nombres y Apellidos</th>
            <th style="border:1px solid #000; width:11%; padding:4px; text-align:center;">Cargo /Empleo /Calidad en la que actúa</th>
            <th style="border:1px solid #000; width:13%; padding:4px; text-align:center;">Empresa / Entidad / Dependencia / Organización</th>
            <th style="border:1px solid #000; width:9%; padding:4px; text-align:center;">Teléfono Fijo / Número Celular</th>
            <th style="border:1px solid #000; width:18%; padding:4px; text-align:center;">Correo Electrónico</th>
            <th style="border:1px solid #000; width:9%; padding:4px; text-align:center;">Firma</th>

        </tr>
    </thead>

    <tbody>
    @foreach($integrante as $index => $a)
        <tr>
            <td style="border:1px solid #000; padding:4px; text-align:center;">
                {{ $index + 1 }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:center;">
                {{ $a->tipo_documento ?? 'Cédula de Ciudadanía' }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:center;">
                {{ $a->documento ?? '' }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:left;">
                {{ trim(($a->nombre1 ?? '').' '.($a->nombre2 ?? '').' '.($a->apellido1 ?? '').' '.($a->apellido2 ?? '')) }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:left;">
                {{ strtolower($a->cargo) ?? '' }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:left;">
                {{ $a->empresa ?? '' }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:center;">
                {{ $a->telefono ?? '' }}
            </td>

            <td style="border:1px solid #000; padding:4px; text-align:left; 
                    white-space:nowrap; font-size:11px;">
                {{ strtolower($a->correo ?? '') }}
            </td>


            <td style="border:1px solid #000; padding:4px; text-align:center; height:40px;">
                @if(!empty($a->firma))
                    <img src="{{ public_path('firma/' . $a->firma) }}" style="max-height:35px; max-width:120px;">
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



{{-- ===== Página 3: Historial del evento (opcional) ===== --}}
@if(!empty($historial))
    <div class="page-break"></div>

    <div class="hist-title">Historial del evento</div>

    <table class="grid hist">
        <thead>
            <tr>
                <th style="width:5%;">#</th>
                <th style="width:55%;">Mensaje</th>
                <th style="width:15%;">Fecha</th>
                <th style="width:10%;">Ciudad</th>
                <th style="width:15%;">Dirección IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historial as $idx => $h)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td>{{ $h['mensaje'] ?? '' }}</td>
                    <td>{{ $h['fecha'] ?? '' }}</td>
                    <td>{{ $h['ciudad'] ?? '' }}</td>
                    <td>{{ $h['ip'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</body>
</html>
