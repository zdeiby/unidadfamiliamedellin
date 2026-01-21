@extends('layouts.visionarios')

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .lgbt-flag {
        width: 60%; /* Ajusta al tamaño del contenedor */
        height: calc(1.0em + .75rem + 2px); /* Tamaño estándar de un input Bootstrap */
        border-radius: 5px; /* Bordes redondeados como el input */
        background: linear-gradient(to bottom,
            #FF0000 16.6%, /* Rojo */
            #FF8C00 33.2%, /* Naranja */
            #FFFF00 49.8%, /* Amarillo */
            #008000 66.4%, /* Verde */
            #0000FF 83%, /* Azul */
            #800080 100% /* Morado */
        );
        border: 1px solid #ccc; /* Imitar el borde del input */
    }
</style>
@section('content')
<div class="container pt-2">
<img width="100%"   src="{{ asset('banners/formularioautorizacionimagen/foto_baner_uso_imagen.jpg') }}" alt=""> 

<form id="Formulariovisionarios"  >
@csrf
        <div class="text-center pt-4 pb-1">
            <label for="" class="text-center"><b class="text-center">FORMULARIO VISION4RIOS</b></label>
        </div>

        <br>
        <div class="progress" role="progressbar"  style="/* position: sticky; top: 0; z-index: 999; width: 100%; padding-top:-2px */"  aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%"></div>
        </div>
        <br>

        <div class="alert alert-info ">
            Formulario de Caracterización                 
        </div>
      

        <!-- <div class="alert alert-info ">
        Diligenciar el siguiente formulario en caso de que se encuentre interesado en alguno de los programas de la Agencia de Educación Postsecundaria de Medellín SAPIENCIA y que desee recibir información en caso de que se abran nuevas convocatorias.        <br><br>

            El Municipio de Medellín no podrá cederlo a terceros. Dicha cesión la realizo de manera gratuita, sin ánimo de recibir compensación económica alguna.
            <br><br>                   
        </div>

        <div class="alert alert-success ">
        Cuando envíe este formulario, el propietario verá su nombre y dirección de correo electrónico.
            <br><br>
                   
        </div>
        <div class="text-center pt-4 pb-4"> 
            <label><b>CUESTIONARIO INTERÉS PROGRAMAS SAPIENCIA</b></label>
        </div> -->


        <!-- INFORMACION USUARIO-->


            <div class="row g-3 was-validated"> 
                <label for="validationServer04" class="form-label">Nombres y apellidos aspirante</label>
                <div class="col-md-3" style="display:none">
                    <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="periodo" name="periodo" value="{{$periodo}}" required>
                    <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="tabla" name="tabla" value="{{$tabla}}" required>
                    <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="habeasdata" name="habeasdata" value="1" required>

                    <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="programa" name="programa" value="{{optional(session('usuario_externo'))['programa'] ?? ''}}" required>
                    <input type="text" class="form-control form-control-sm"  placeholder="Primer nombre"    id="id_usuario" name="id_usuario" value="{{optional(session('usuario_externo'))['id_usuario'] ?? ''}}" required>



                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm" maxlength="10" placeholder="Primer nombre" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  id="nombre1" name="nombre1" value="{{$nombre1}}" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " maxlength="10" placeholder="Segundo nombre" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="nombre2"  name="nombre2" value="{{$nombre2}}" >
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " maxlength="10" placeholder="Primer apellido" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="apellido1" name="apellido1"  value="{{$apellido1}}" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm " maxlength="10" placeholder="Segundo apellido" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" id="apellido2" name="apellido2"  value="{{$apellido2}}" >
                </div>

                <div class="col-md-6" id="documentodiv" >
                    <label for="validationServer04" class="form-label">Nombre completo:</label>
                    <input type="text" class="form-control form-control-sm " style="text-transform: uppercase;"  id="nombre_completo" value="{{$nombre1}} {{$nombre2}} {{$apellido1}} {{$apellido2}}" readOnly>
                </div>
           


            <div class="col-md-6" >
                <label for="validationServer04" class="form-label">Tipo de documento:</label>
                <select class="form-control form-control-sm" id="tipodocumento" name="tipodocumento" aria-describedby="validationServer04Feedback" required="">
                    {!! str_replace('value="'.$tipodocumento.'"', 'value="'.$tipodocumento.'" selected', $t1_tipo_documento_2) !!}
              </select>
            </div>
            <div class="col-md-6" id="documentodiv" >
                <label for="validationServer04" class="form-label">Número de documento:</label>
                <input type="number" class="form-control form-control-sm "  
                minlength="10"
                maxlength="15"  
                onkeypress="return soloNumeros(event)"  
                name="documento"  id="documento" value="{{optional(session('usuario_externo'))['documento'] ?? ''}}" required placeholder="Documento" readOnly>
            </div>

            <!--  -->
            <!-- Botón para abrir el modal -->
            <div class="col-md-6 text-center" >
                    <label for="validationServer04" id="adjuntar"  class="form-label" >Adjuntar:</label>
                    @if (($url_cedula  != ''))
                        <a id="adjunto1" href="{{asset('documentosAdjuntos/formulariovisionarios/' . basename($url_cedula))}}" target="_blank">Ver Documento</a>
                    @else
                    <label id="verDocumento" ></label>
                    @endif
                    <br>
                <!-- Botón para abrir el modal de subir documento PDF -->
                <button type="button" class="btn btn-primary btn-sm" style="background:#663398 !important; border:none" data-bs-toggle="modal" data-bs-target="#modalSubirDocumentoPDF">
                    Adjuntar Documento PDF
                </button>
            </div>

          

            <div class="col-md-6">
                    <label for="validationServer04" class="form-label">Teléfono Fijo:</label>
                    <input type="number" class="form-control form-control-sm" 
                    placeholder="Telefono Fijo" style="text-transform: uppercase;" 
                    id="telefono" name="telefono" value="{{$telefono}}"
                    minlength="10"
                    maxlength="15"  
                    onkeypress="return soloNumeros(event)"  
                    title="Debe ingresar mínimo 10 números">
                </div>

            <div class="col-md-4">
                    <label for="validationServer04" class="form-label">Celular:</label>
                    <input type="number" class="form-control form-control-sm" 
                    placeholder="Celular" style="text-transform: uppercase;" 
                    onkeypress="return soloNumeros(event)"  
                    id="celular" name="celular" value="{{$celular}}"
                    required  pattern="\d{10,}" 
                    minlength="10"
                    maxlength="15" 
                    title="Debe ingresar mínimo 7 números">
                </div>

            
               

          <div class="col-md-4" id="documentodiv" >
                <label for="validationServer04" class="form-label">Correo electrónico:</label>
                <input type="email" onblur="validarcorreo(this)" class="form-control form-control-sm "  style="text-transform: uppercase;" name="correo"  id="correo" value="{{$correo}}" required>
            </div>

            <div class="col-md-4" id="documentodiv" >
                <label for="validationServer04" class="form-label">Confirma Correo electrónico:</label>
                <input type="email" autocomplete="off"    onblur="validarCorreosIguales()" class="form-control form-control-sm " style="text-transform: uppercase;"  id="confirma_correo" value="{{$correo}}" required>
                <span id="errorCorreo" style="color: red; font-size: 12px; display: none;">Los correos no coinciden</span>
            </div>

            <div class="col-md-6" id="documentodiv" >
                <label for="validationServer04" class="form-label">Fecha de nacimiento</label>
                <input type="date" required min="" max="" onblur="validarFechaNacimiento()"  class="form-control form-control-sm " style="text-transform: uppercase;" name="fecha_nacimiento"  id="fecha_nacimiento" value="{{$fecha_nacimiento}}" required>
            </div>

            <div class="col-md-6 pb-2" id="documentodiv" >
                    <label for="validationServer04" class="form-label">Edad:</label>
                    <input type="text" class="form-control form-control-sm "  id="edad" value="" readOnly>
            </div>

            <hr>

            <div class="col-md-6" id="nombre_tutordiv">
                <label for="nombre_tutor" class="form-label">Nombre del padre/madre/tutor</label>
                <input type="text" class="form-control form-control-sm" id="nombre_tutor" name="nombre_tutor" required value="{{$nombre_tutor}}">  
            </div>

            <div class="col-md-6" id="tipodocumento_tutordiv">
                <label for="validationServer04" class="form-label">Tipo de documento tutor:</label>
                <select class="form-control form-control-sm" id="tipodocumento_tutor" name="tipodocumento_tutor" aria-describedby="validationServer04Feedback" required="">
                {!! str_replace('value="'.$tipodocumento_tutor.'"', 'value="'.$tipodocumento_tutor.'" selected', $t1_tipo_documento_2) !!}
              </select>
            </div>
            <div class="col-md-6" id="documento_tutordiv" >
                <label for="validationServer04" class="form-label">Número de documento tutor:</label>
                <input type="number" class="form-control form-control-sm "   minlength="10"
                maxlength="15"  
                onkeypress="return soloNumeros(event)" name="documento_tutor"  id="documento_tutor" value="{{$documento_tutor}}" required placeholder="Documento">
            </div>
            <div class="col-md-6" id="telefono_tutordiv">
                                <label for="validationServer04" class="form-label">Teléfono de contacto tutor:</label>
                                <input type="text" class="form-control form-control-sm" 
                                placeholder="Telefono Fijo" style="text-transform: uppercase;" 
                                onkeypress="return soloNumeros(event)"  
                                id="telefono_tutor" name="telefono_tutor" value="{{$telefono_tutor}}"
                                
                                minlength="10"
                                maxlength="15" 
                                title="Debe ingresar mínimo 10 números">
                            </div>
            <div class="col-md-4" id="correo_tutordiv" >
                            <label for="validationServer04" class="form-label">Correo electrónico tutor:</label>
                            <input type="email" onblur="validarcorreo(this)" class="form-control form-control-sm " style="text-transform: uppercase;" name="correo_tutor"  id="correo_tutor" value="{{$correo_tutor}}" required>
                        </div>

                        <hr>

            <div class="col-md-3">
                <label for="t1_estado_civil" class="form-label">Estado civil</label>
                <select class="form-control form-control-sm" id="estado_civil" name="estado_civil" required>
                {!! str_replace('value="'.$estado_civil.'"', 'value="'.$estado_civil.'" selected', $t1_estado_civil) !!}

                </select>
            </div>

            <div class="col-md-3">
                <label for="t1_sexo" class="form-label">Sexo</label>
                <select class="form-control form-control-sm" id="sexo" name="sexo" required>
                    {!! str_replace('value="'.$sexo.'"', 'value="'.$sexo.'" selected', $t1_sexo) !!}
                </select>
            </div>

            <div class="col-md-4">
                <label for="t1_identidad_genero" class="form-label">Identidad de género</label>
                <select class="form-control form-control-sm" id="identidad_genero" name="identidad_genero" required>
                    {!! str_replace('value="'.$identidad_genero.'"', 'value="'.$identidad_genero.'" selected', $t1_identidad_genero) !!}
                </select>
            </div>

            <div class="col-md-4">
                <label for="t1_orientacion_sexual" class="form-label">Orientación sexual</label>
                <select class="form-control form-control-sm" id="orientacion_sexual" name="orientacion_sexual" required>
                {!! str_replace('value="'.$orientacion_sexual.'"', 'value="'.$orientacion_sexual.'" selected', $t1_orientacion_sexual) !!}

                </select>
            </div>

            <!-- <div class="col-md-4 pb-4" >
                <label for="t1_lgbtiq" class="form-label">LGBTIQ+</label>
                <select class="form-control form-control-sm" id="lgbtiq" name="lgbtiq" required>
                {!! str_replace('value="'.$lgbtiq.'"', 'value="'.$lgbtiq.'" selected', $t1_sino) !!}
                </select>
            </div> -->

            <div class="col-md-1" id="lgbtiqdiv" style="display:none">
                <label for="validationServer04" class="form-label">LGBTIQ+</label>
                <input style="display:none" type="text" class="form-control form-control-sm " style="text-transform: uppercase;" name="lgbtiq"  id="lgbtiq" value="{{$lgbtiq}}" required>
                <div class="lgbt-flag"></div>
            </div>



            <hr >

            <div class="col-md">
                <label for="t1_pais_nacimiento" class="form-label">País de nacimiento</label>
                <select class="form-control form-control-sm" id="pais_nacimiento" name="pais_nacimiento" required>
                {!! str_replace('value="'.$pais_nacimiento.'"', 'value="'.$pais_nacimiento.'" selected', $t1_pais) !!}
                </select>
            </div>

            <div class="col-md" id="departamento_nacimientodiv">
                <label for="t1_departamento_nacimiento" class="form-label">Departamento de nacimiento</label>
                <select class="form-control form-control-sm" id="departamento_nacimiento" name="departamento_nacimiento" required>
                {!! str_replace('value="'.$departamento_nacimiento.'"', 'value="'.$departamento_nacimiento.'" selected', $t1_departamento) !!}
                </select>
            </div>

            <div class="col-md pb-4" id="municipio_nacimientodiv" >
                <label for="t1_municipio_nacimiento" class="form-label">Municipio de nacimiento</label>
                <select class="form-control form-control-sm" id="municipio_nacimiento" name="municipio_nacimiento" required>
                   
                </select>
            </div>

            <hr>

            <div class="col-md-4" id="pais_residenciadiv">
                <label for="t1_pais_residencia" class="form-label">País de residencia</label>
                <select class="form-control form-control-sm" id="pais_residencia" name="pais_residencia" required>
                {!! str_replace('value="'.$pais_residencia.'"', 'value="'.$pais_residencia.'" selected', $t1_pais) !!}
                </select>
            </div>

            <div class="col-md-4" id="departamento_residenciadiv">
                <label for="t1_departamento_residencia" class="form-label">Departamento de residencia</label>
                <select class="form-control form-control-sm" id="departamento_residencia" name="departamento_residencia" required>
                {!! str_replace('value="'.$departamento_residencia.'"', 'value="'.$departamento_residencia.'" selected', $t1_departamento) !!}
                </select>
            </div>

            <div class="col-md-4 pb-4" id="municipio_residenciadiv">
                <label for="t1_municipio_residencia" class="form-label">Municipio de residencia</label>
                <select class="form-control form-control-sm" id="municipio_residencia" name="municipio_residencia" required>
                   
                </select>
            </div>
            

            <div class="col-md-6" id="comuna_residenciadiv">
                <label for="t1_comuna_residencia" class="form-label">Comuna o corregimiento de residencia</label>
                <select class="form-control form-control-sm" id="comuna_residencia" name="comuna_residencia" required>
                    
                </select>
            </div>

            <div class="col-md-6 pb-3" id="barrio_residenciadiv">
                <label for="t1_barrio_residencia" class="form-label">Barrio de residencia</label>
                <select class="form-control form-control-sm" id="barrio_residencia" name="barrio_residencia" required>
                    
                </select>
            </div>

            <div class="col-md-6" >
            <label for="validationServer04" id="adjuntarCuenta" class="form-label">Adjuntar:</label>
            

            @if (($url_servicios  != ''))
                <a  id="adjunto2" href="{{ asset('documentosAdjuntos/formulariovisionarios/' . basename($url_servicios)) }}" target="_blank">Ver Documento</a>
            @else
            <label id="verCuenta"></label>
            @endif
            <br>
                <!-- Botón para abrir el modal de subir documento PDF -->
                <button type="button" style="background:#663398 !important" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSubirCuentaPDF">
                    Adjuntar Cuenta de servicios PDF
                </button>
            </div>

            
            

            <div class="">
          <label for="" class="form-label"><b>¿Cuál es la dirección de tu vivienda?</b></label>
          <div class="row">       
            <div class="form-group col-sm">
                <label for="dirCampo1">Via principal:</label>
                    <select class="form-control form-control-sm" id="dirCampo1" name="dirCampo1" oninput="llenarotrocampo()" required="" >            
                        {!! str_replace('value="'.$dirCampo1.'"', 'value="'.$dirCampo1.'" selected', $t1_viaprincipal) !!}
                    </select>
            </div>
            <div class="form-group col-sm">
                <label for="dirCampo2">Número<br></label>
                <input type="text" class="form-control form-control-sm" id="dirCampo2" name="dirCampo2" style="text-transform: uppercase;" required="" onkeypress="return soloNumeros(event)" oninput="llenarotrocampo();" value="{{$dirCampo2}}">
            </div>
            <div class="form-group col-sm">
                <label for="dirCampo3">Prefijo<br></label>
                <input type="text" class="form-control form-control-sm" id="dirCampo3" name="dirCampo3" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" oninput="llenarotrocampo();" value="{{$dirCampo3}}">
            </div>
            <div class="form-group col-sm">
                <label for="dirCampo4">Nombre vía<br></label>
                <select class="form-control form-control-sm" id="dirCampo4" name="dirCampo4" oninput="llenarotrocampo()">
                {!! str_replace('value="'.$dirCampo4.'"', 'value="'.$dirCampo4.'" selected', $t1_nombrevia) !!}
                </select>
            </div>  
            <div class="form-group col-sm-1">
                <label for=""><br></label>
                <h4>#</h4>
            </div>          
        </div>

        <div class="row">
            <div class="form-group col-sm">
                <label for="dirCampo5">Via secundaria:</label>
                <input type="text" class="form-control form-control-sm" id="dirCampo5" name="dirCampo5" style="text-transform: uppercase;" onkeypress="return soloNumeros(event)" oninput="llenarotrocampo();" value="{{$dirCampo5}}">
            </div>
            <div class="form-group col-sm">
                <label for="dirCampo6">Prefijo<br></label>
                <input type="text" class="form-control form-control-sm" id="dirCampo6" name="dirCampo6" style="text-transform: uppercase;" onkeypress="return soloLetras(event)" oninput="llenarotrocampo();" value="{{$dirCampo6}}">
            </div>
            <div class="form-group col-sm">
                <label for="dirCampo7">cuadrante<br></label>
                <select class="form-control form-control-sm" id="dirCampo7" name="dirCampo7" oninput="llenarotrocampo()">
                {!! str_replace('value="'.$dirCampo7.'"', 'value="'.$dirCampo7.'" selected', $t1_nombrevia) !!}
                </select>
            </div>
            <div class="form-group col-sm-1">
                <label for=""><br></label>
                <h4>-</h4>
            </div> 
            <div class="form-group col-sm">
                <label for="dirCampo8">Placa<br></label>
                <input type="text" class="form-control form-control-sm" id="dirCampo8" name="dirCampo8" style="text-transform: uppercase;" onkeypress="return soloNumeros(event)" oninput="llenarotrocampo();" value="{{$dirCampo8}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                <label for="dirCampo9">Complemento:</label>
                <input type="text" class="form-control form-control-sm" id="dirCampo9" name="dirCampo9" style="text-transform: uppercase;" oninput="llenarotrocampo();" value="{{$dirCampo9}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-sm">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control form-control-sm form-control-plaintext" id="direccion" name="direccion" style="text-transform: uppercase;" value="{{$direccion}}" readonly="">
            </div>
        </div>
        </div>
        <br>

            <!-- <div class="col-md-12">
                <label for="direccion_residencia" class="form-label">Dirección de residencia</label>
                <input type="text" class="form-control form-control-sm" id="direccion_residencia" name="direccion_residencia" required>
            </div> -->

            

            <div class="col-md-4">
                <label for="t1_tiempo_residencia" class="form-label">Tiempo de residencia</label>
                <select class="form-control form-control-sm" id="tiempo_residencia" name="tiempo_residencia" required>
                    {!! str_replace('value="'.$tiempo_residencia.'"', 'value="'.$tiempo_residencia.'" selected', $t1_tiempo_residencia) !!}
                </select>
            </div>

            <div class="col-md-4">
                <label for="t1_tiene_hijos" class="form-label">¿Tiene hijos o hijas?</label>
                <select class="form-control form-control-sm" id="tiene_hijos" name="tiene_hijos" required>
                {!! str_replace('value="'.$tiene_hijos.'"', 'value="'.$tiene_hijos.'" selected', $t1_sino) !!}
                </select>
            </div>

            <div class="col-md-4">
                <label for="t1_consume_sustancias" class="form-label">¿Consume alguna sustancia lícita o ilícita?</label>
                <select class="form-control form-control-sm" id="consume_sustancias" name="consume_sustancias" required>
                {!! str_replace('value="'.$consume_sustancias.'"', 'value="'.$consume_sustancias.'" selected', $t1_consume_sustancias) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="t1_estrato_vivienda" class="form-label">Estrato de la vivienda en la que resides</label>
                <select class="form-control form-control-sm" id="estrato_vivienda" name="estrato_vivienda" required>
                {!! str_replace('value="'.$estrato_vivienda.'"', 'value="'.$estrato_vivienda.'" selected', $t1_estrato) !!}
                </select>
            </div>

            <div class="col-md-6">
                <label for="puntaje_sisben" class="form-label">Puntaje del Sisbén</label>
                <select class="form-control form-control-sm" id="puntaje_sisben" name="puntaje_sisben" required>
                {!! str_replace('value="'.$puntaje_sisben.'"', 'value="'.$puntaje_sisben.'" selected', $t1_puntaje_sisben) !!}
                </select>
            </div>

            <div class="col-md-6" id="como_entero_div">
                <label for="como_entero" class="form-label">¿Cómo te enteraste de la convocatoria?</label>
                <select class="form-control form-control-sm" id="como_entero" name="como_entero" aria-describedby="como_enteroFeedback" required>
                    {!! str_replace('value="'.$como_entero.'"', 'value="'.$como_entero.'" selected', $t1_como_se_entero) !!}
                </select>
            </div>

            <!-- <div class="col-md-6" id="otro_cualdiv">
                <label for="direccion">¿Cuál?</label>
                <input type="text" class="form-control form-control-sm" id="otro_cual" name="otro_cual" aria-describedby="como_enteroFeedback" style="text-transform: uppercase;" value="{{$otro_cual}}">
            </div> -->

            <div class="col-md-6" id="otro_cualdiv" style="display:none">
                <label for="validationServer04" class="form-label">¿Cuál?</label>
                <input type="text"  class="form-control form-control-sm "  style="text-transform: uppercase;" name="otro_cual"  id="otro_cual" value="{{$otro_cual}}" required>
            </div>

            
            
           


    </div>
    <br>

     
        
    </div>

            <div class="text-center col pt-4 pb-4"> <!-- text-end -->
                <button class="btn btn-outline-success" type="button" onclick="guardarFormulario(event)">Guardar</button>
                <a <?= $siguiente ?> href="{{ route('visionarios.criteriosdepriorizacion') }}" id="siguiente" class="btn btn-outline-primary" >
                    Siguiente
                </a>

                    <!-- <div class="btn btn-outline-primary" id="siguiente" style="display:none">Siguiente</div> -->
            </div>
        </div>
    </div>
    </form>
</div>  

<!-- Modal para subir un Documento PDF -->
<!-- Modal para subir un Documento PDF -->
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
                                <label for="documento1" class="form-label">Selecciona un archivo:</label>
                                <input type="file" class="form-control" name="documento1" id="documento1" required>
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




<div class="modal fade" id="modalSubirCuentaPDF" tabindex="-1" aria-labelledby="modalSubirCuentaPDFLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSubirDocumentoPDFLabel">Subir Cuenta de servicios PDF</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="uploadFormCuenta" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="documento2" class="form-label">Selecciona un archivo:</label>
                            <input type="file" class="form-control" name="documento2" id="documento2" accept=".pdf" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Subir Cuenta de Servicios</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p id="mensajeExito" class="text-success fw-bold d-none">✅ Documento subido correctamente.</p>
                        <p id="mensajeError" class="text-danger fw-bold d-none">❌ Error al subir el documento.</p>
                        <p id="archivoSubidoCuenta"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="bienvenidos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¡Hola!</h5>

                </div>
                <div class="modal-body">

                    <div id="global">
                        <div id="mensajes">

                            En observancia de la Ley 1581 de 2012, reglamentada parcialmente por el Decreto 1377 de
                            2013 y en la
                            política de tratamiento de datos adoptado por SAPIENCIA,
                            la importancia de la neutralidad de los medios tecnológicos y de comunicación, e
                            interpretando todos
                            estos de manera sistémica e integral en aras de la protección de los
                            derechos y principios que circundan el Habeas Data y el Tratamiento de Datos Personales,
                            se establecen
                            las siguientes condiciones:
                            <b>1) FINALIDAD DEL TRATAMIENTO DE LOS DATOS PERSONALES PARA PERSONA JURÍDICA Y NATURAL:
                                a) </b>el
                            cumplimiento del lleno de requisitos formales para la suscripción de actas
                            de compromiso y la posterior aplicación de los derechos y obligaciones que surgen entre
                            las partes con
                            ocasión de su suscripción.
                            <b>b)</b> el cumplimiento de la Ley de Transparencia y el Derecho de Acceso a la
                            Información Pública
                            Nacional (Ley 1712 del 2014).
                            <b>c)</b> La presentación de informes a los organismos de control.
                            <b>d)</b> para la entrega de información a entidades cuyo objeto social y/o misional
                            incluya la
                            recolección de datos estadísticos, históricos y científicos.
                            <b>e)</b> por solicitud de autoridad judicial. Manifiesto que me informaron que, si soy
                            menor de edad
                            y/o en caso de recolección de mi información sensible,
                            tengo derecho a contestar o no las preguntas que me formulen y a entregar o no los datos
                            solicitados.
                            Entiendo que son datos sensibles aquellos que afectan la intimidad del titular o cuyo
                            uso indebido pueda
                            generar discriminación
                            (información étnica, racial, su orientación política, convicciones religiosas o
                            filosóficas, la
                            pertenencia a sindicatos, organizaciones sociales, de derechos humanos,
                            así como los relativos a la salud, vida sexual y datos biométricos).Manifiesto que me
                            informaron que los
                            datos sensibles que se recolectarán serán utilizados para las
                            finalidades descritas por la Agencia (Uso, recolección, actualización, transferencia)
                            <b>Nota:</b> Cualquier uso de la información distinto a lo aquí establecido, no es
                            aceptado ni permitido
                            por <b>SAPIENCIA. 2) AVISO DE PRIVACIDAD:</b>
                            Para los efectos de esta cláusula y del aviso de privacidad, se consideran datos
                            sensibles aquellos que
                            puedan revelar aspectos como origen racial o étnico, estado
                            de salud presente y futura, información genética, creencias religiosas, filosóficas y
                            morales,
                            afiliación sindical, opiniones políticas, preferencia sexual y todos aquellos
                            datos que puedan afectar la intimidad del titular o cuyo uso indebido pueda generar su
                            discriminación.
                            Respecto a estos
                            <b>SAPIENCIA</b> se obliga al uso adecuado de los mismos en concordancia con la
                            normativa vigente, la
                            buena fe, el orden público y el presente Aviso.
                            <b>3) MECANISMOS PARA LA PROTECCIÓN DE DATOS PERSONALES: ACCESO, RECTIFICACIÓN,
                                CANCELACIÓN U
                                OPOSICIÓN:</b>
                            la persona natural o jurídica Titular de Datos Personales puede solicitar a
                            <b>SAPIENCIA</b> en
                            cualquier momento, el acceso, la rectificación, la cancelación u oposición respecto
                            a los datos personales que le conciernen, en este sentido, presentará su solicitud
                            radicándola
                            directamente en la Entidad o ingresando a la página web
                            <a href="http://www.sapiencia.gov.co" target="_blank">www.sapiencia.gov.co</a> en la
                            opción de
                            Contáctenos o escribiendo al correo <a href="info@sapiencia.gov.co">info@sapiencia.gov.co</a>
                            o comunicándose al teléfono en Medellín: (+57 4) 444 7947.
                            <br><b>PARÁGRAFO:</b> con la suscripción de este formulario se entiende aceptada la
                            finalidad del
                            tratamiento de datos y que conoce los mecanismos para su protección.
                            <br>
                            
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"  onclick="guardarhabeasdata(event);">Aceptar</button>
                <!--    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button> -->
                </div>
            </div>
        </div>
    </div>



<!-- jQuery desde Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>

$('#como_entero').change(function(){
    if($('#como_entero').val() != '10'){
        $('#otro_cual').val('N/A');
        $('#otro_cual').removeAttr('required');
        $('#otro_cualdiv').hide();
        
    }else{
        $('#otro_cual').attr('required','required');
        $('#otro_cual').val('');
        $('#otro_cualdiv').show();
    }
});


    
$('#pais_nacimiento').change(function(){
    if($('#pais_nacimiento').val() != '1'){
        $('#departamento_nacimiento').val('');
        $('#departamento_nacimiento').removeAttr('required');
        $('#departamento_nacimientodiv').hide();

        $('#municipio_nacimiento').val('');
        $('#municipio_nacimiento').removeAttr('required');
        $('#municipio_nacimientodiv').hide();

        
    }else{
        $('#departamento_nacimiento').attr('required','required');
        $('#departamento_nacimiento').val('');
        $('#departamento_nacimientodiv').show();

        $('#municipio_nacimiento').attr('required','required');
        $('#municipio_nacimiento').val('');
        $('#municipio_nacimientodiv').show();
    }
});


$('#pais_residencia').change(function(){
    if($('#pais_residencia').val() != '1'){
        $('#departamento_residencia').val('');
        $('#departamento_residencia').removeAttr('required');
        $('#departamento_residenciadiv').hide();

        $('#municipio_residencia').val('');
        $('#municipio_residencia').removeAttr('required');
        $('#municipio_residenciadiv').hide();

        $('#comuna_residencia').val('');
        $('#comuna_residencia').removeAttr('required');
        $('#comuna_residenciadiv').hide();

        $('#barrio_residencia').val('');
        $('#barrio_residencia').removeAttr('required');
        $('#barrio_residenciadiv').hide();

        
        
    }else{
        $('#departamento_residencia').attr('required','required');
        $('#departamento_residencia').val('');
        $('#departamento_residenciadiv').show();

        $('#municipio_residencia').attr('required','required');
        $('#municipio_residencia').val('');
        $('#municipio_residenciadiv').show();

        $('#comuna_residencia').attr('required','required');
        $('#comuna_residencia').val('');
        $('#comuna_residenciadiv').show();

        $('#barrio_residencia').attr('required','required');
        $('#barrio_residencia').val('');
        $('#barrio_residenciadiv').show();
    }
});


$('#departamento_residencia').change(function(){
    if($('#departamento_residencia').val() != '1'){


        $('#comuna_residencia').val('');
        $('#comuna_residencia').removeAttr('required');
        $('#comuna_residenciadiv').hide();

        $('#barrio_residencia').val('');
        $('#barrio_residencia').removeAttr('required');
        $('#barrio_residenciadiv').hide();

        
        
    }else{

        $('#comuna_residencia').attr('required','required');
        $('#comuna_residencia').val('');
        $('#comuna_residenciadiv').show();

        $('#barrio_residencia').attr('required','required');
        $('#barrio_residencia').val('');
        $('#barrio_residenciadiv').show();
    }
});


$('#municipio_residencia').change(function(){
    if($('#municipio_residencia').val() != '1'){


        $('#comuna_residencia').val('');
        $('#comuna_residencia').removeAttr('required');
        $('#comuna_residenciadiv').hide();

        $('#barrio_residencia').val('');
        $('#barrio_residencia').removeAttr('required');
        $('#barrio_residenciadiv').hide();

        
        
    }else{

        $('#comuna_residencia').attr('required','required');
        $('#comuna_residencia').val('');
        $('#comuna_residenciadiv').show();

        $('#barrio_residencia').attr('required','required');
        $('#barrio_residencia').val('');
        $('#barrio_residenciadiv').show();
    }
});

$('#fecha_nacimiento').change(function(){
    if($('#edad').val() <= '17'){

        $('#nombre_tutor').val('');
       // $('#comuna_residencia').removeAttr('required');
        $('#nombre_tutordiv').show();  


        $('#tipodocumento_tutor').val('');
        $('#tipodocumento_tutordiv').show(); 
        $('#tipodocumento_tutor').attr('required','required');
       

        $('#documento_tutor').val('');
        $('#documento_tutordiv').show(); 

        $('#telefono_tutor').val('');
        $('#telefono_tutordiv').show(); 

        $('#correo_tutor').val('');
        $('#correo_tutordiv').show(); 

        $('#documento_tutor').attr('required','required');
        $('#correo_tutor').attr('required','required');
        




    }else{
        $('#nombre_tutor').val('NO APLICA');
       // $('#comuna_residencia').removeAttr('required');
        $('#nombre_tutordiv').hide(); 

        $('#tipodocumento_tutor').val('NO APLICA');
        $('#tipodocumento_tutordiv').hide();  
        
        

        $('#documento_tutor').val('NO APLICA');
        $('#documento_tutordiv').hide(); 
        $('#documento_tutor').removeAttr('required');
        $('#tipodocumento_tutor').removeAttr('required');
        $('#correo_tutor').removeAttr('required');


        

        $('#telefono_tutor').val('NO APLICA');
        $('#telefono_tutordiv').hide(); 

        $('#correo_tutor').val('NO APLICA');
        $('#correo_tutordiv').hide(); 
    }
});









function guardarFormulario(event) {
    event.preventDefault(); // Evita la recarga de la página

    const form = document.getElementById('Formulariovisionarios');
    const formData = new FormData();

    
    if (!validarCorreosIguales()) {
        mostrarAlerta("Advertencia", "Los correos, no coinciden.", "warning");
        return; // Detiene el envío si los correos no coinciden
    }

    const inputsRequeridos = form.querySelectorAll("[required]");
    for (const input of inputsRequeridos) {
        if (!input.value.trim()) {
            input.classList.add("is-invalid"); // Agrega estilo de error
            input.focus(); // Enfoca el primer campo vacío
            console.log(`⚠️ Error: El campo "${input.name}" (ID="${input.id}") está vacío.`);
            mostrarAlerta("Advertencia", "Por favor, complete todos los campos obligatorios.", "warning");
            return; // Detiene la ejecución
        } else {
            input.classList.remove("is-invalid"); // Quita el estilo si está lleno
        }
    }


   

      // 🚨 Validar el número de teléfono (mínimo 10 dígitos)
      let telefono = document.getElementById('celular');
    if (telefono.value.length < 10 || isNaN(telefono.value)) {
        mostrarAlerta("Advertencia", "El telefóno debe incluir 10 numeros, Si es número fijo agregar indicativo, ejemplo 604.", "warning");
        telefono.classList.add("is-invalid");
        return;
    } else {
        telefono.classList.remove("is-invalid");
    }


    let documentosAdjuntos = 0;

    try {
        const urlCedula = document.getElementById('verDocumento')?.innerHTML.trim() || document.getElementById('adjunto1')?.href || '';
        const urlServicios = document.getElementById('verCuenta')?.innerHTML.trim() || document.getElementById('adjunto2')?.href || '';

        if (!urlCedula || !urlServicios) {
            mostrarAlerta('Advertencia', 'Debes adjuntar ambos documentos requeridos antes de enviar el formulario.', 'warning');
            return false;
        }
    } catch (error) {
        console.error('Error al verificar documentos adjuntos:', error);
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
       // mostrarAlertaReload("Guardado", "Formulario guardado con éxito.", "success");

       showToast("Guardado Correctamente");
       $('#siguiente').css('display','');

    })
    .catch(error => {
        console.error('Error al guardar:', error);
        mostrarAlerta("Error", "Hubo un problema al guardar el formulario.", "error");
    });
}




function guardarhabeasdata(event) {
    event.preventDefault(); // Evita la recarga de la página

    const form = document.getElementById('Formulariovisionarios');
    const formData = new FormData();
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
       // mostrarAlertaReload("Guardado", "Formulario guardado con éxito.", "success");

       showToast("Guardado Correctamente");
       setTimeout(() => {
        location.reload();
       }, 1000);

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
    document.addEventListener("DOMContentLoaded", function () {

       
        if('<?= $nombre1 ?>' != ''){
            $('#condicionesvulnerabilidad').show();
        }
        if('<?= $documento2 ?>' != ''){
            $('#distincionessociales').show();
        }
        if('<?= $documento3 ?>' != ''){
            $('#certificacionesadicionales').show();
        }if('<?= $habeasdata ?>' != '1'){
            abrirModalBienvenida();
        }


        function abrirModalBienvenida() {
            var modal = new bootstrap.Modal(document.getElementById('bienvenidos'));
            var modalBienvenidos = new bootstrap.Modal(document.getElementById("bienvenidos"), {
                backdrop: "static",
                keyboard: false
            });
            modal.show();
        }
        

        // Uso de la función:
      
        


    function actualizarNombreCompleto() {
        let nombre1 = document.getElementById("nombre1").value.trim();
        let nombre2 = document.getElementById("nombre2").value.trim();
        let apellido1 = document.getElementById("apellido1").value.trim();
        let apellido2 = document.getElementById("apellido2").value.trim();

        // Concatenar nombres y apellidos, eliminando espacios extra
        let nombreCompleto = [nombre1, nombre2, apellido1, apellido2]
            .filter(nombre => nombre !== "")
            .join(" ");

        document.getElementById("nombre_completo").value = nombreCompleto;
    }

    // Agregar evento a los campos de entrada
    document.getElementById("nombre1").addEventListener("input", actualizarNombreCompleto);
    document.getElementById("nombre2").addEventListener("input", actualizarNombreCompleto);
    document.getElementById("apellido1").addEventListener("input", actualizarNombreCompleto);
    document.getElementById("apellido2").addEventListener("input", actualizarNombreCompleto);
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    function calcularEdad() {
        let fechaNacimiento = document.getElementById("fecha_nacimiento").value;
        if (!fechaNacimiento) return; // No calcular si el campo está vacío

        let fechaNacimientoDate = new Date(fechaNacimiento);
        let hoy = new Date();

        let edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
        let mes = hoy.getMonth() - fechaNacimientoDate.getMonth();
        let dia = hoy.getDate() - fechaNacimientoDate.getDate();

        // Ajustar edad si aún no ha pasado el cumpleaños este año
        if (mes < 0 || (mes === 0 && dia < 0)) {
            edad--;
        }

        document.getElementById("edad").value = edad >= 0 ? edad : "";
    }
    calcularEdad();
    // Agregar evento cuando cambie la fecha
    document.getElementById("fecha_nacimiento").addEventListener("input", calcularEdad);
});

</script>

<script>
    function llenarotrocampo() 
    {

        var dir1 = document.getElementById("dirCampo1");
        var dir1 = dir1.options[dir1.selectedIndex].text;

        var dir4 = document.getElementById("dirCampo4");
        var dir4 = dir4.options[dir4.selectedIndex].text;
        if (dir4 == 'Seleccione una opción'){dir4 = '';}

        var dir7 = document.getElementById("dirCampo7");
        var dir7 = dir7.options[dir7.selectedIndex].text;
        if (dir7 == 'Seleccione una opción'){dir7 = '';}

        if ($('#dirCampo1').val() !== '' || $('#dirCampo2').val() !== '' || $('#dirCampo3').val() !== '' || $('#dirCampo4').val() !== '') {
            var numeral = "#";
        } else {
            numeral = "";
        }

        if ($('#dirCampo1').val() == '20') {

            $('#dirCampo2').prop('disabled', true);
            $('#dirCampo3').prop('disabled', true);
            $('#dirCampo4').prop('disabled', true);
            $('#dirCampo5').prop('disabled', true);
            $('#dirCampo6').prop('disabled', true);
            $('#dirCampo7').prop('disabled', true);
            $('#dirCampo8').prop('disabled', true);

            $('#dirCampo2').val('');
            $('#dirCampo3').val('');
            $('#dirCampo4').val('');
            $('#dirCampo5').val('');
            $('#dirCampo6').val('');
            $('#dirCampo7').val('');
            $('#dirCampo8').val('');

            $('#dirCampo2').prop('required', false);
            $('#dirCampo5').prop('required', false);
            $('#dirCampo8').prop('required', false);
            $('#dirCampo9').prop('required', true);

            $('#direccion').val($('#dirCampo9').val());
        } else {

            $('#dirCampo2').prop('disabled', false);
            $('#dirCampo3').prop('disabled', false);
            $('#dirCampo4').prop('disabled', false);
            $('#dirCampo5').prop('disabled', false);
            $('#dirCampo6').prop('disabled', false);
            $('#dirCampo7').prop('disabled', false);
            $('#dirCampo8').prop('disabled', false);

            //$('#dirCampo9').val('');

            $('#dirCampo2').prop('required', true);
            $('#dirCampo5').prop('required', true);
            $('#dirCampo8').prop('required', true);
            $('#dirCampo9').prop('required', false);

            $('#direccion').val(dir1 + " " + $('#dirCampo2').val() + " " + $('#dirCampo3').val() + " " + dir4 + " " + numeral + " " + $('#dirCampo5').val() + " " + $('#dirCampo6').val() + " " + dir7 + " " + $('#dirCampo8').val() + " || " + $('#dirCampo9').val());
        }
    }
</script>

<script>
       document.addEventListener("DOMContentLoaded", function () {
        const departamentoSelect = document.getElementById("departamento_nacimiento");
        const municipioSelect = document.getElementById("municipio_nacimiento");

        departamentoSelect.addEventListener("change", function () {
            const departamentoId = this.value;
            municipioSelect.innerHTML = '<option value="">Cargando...</option>'; 

            if (departamentoId) {
                fetch("{{ route('visionarios.getmunicipios', ['codigo_departamento' => '__CODIGO__']) }}".replace('__CODIGO__', departamentoSelect.options[departamentoSelect.selectedIndex].dataset.codigo))
                    .then(response => response.json())
                    .then(data => {
                        municipioSelect.innerHTML = data.html; // 🔄 Inyectar HTML en el select
                    })
                    .catch(error => {
                        console.error("Error al cargar municipios:", error);
                        municipioSelect.innerHTML = '<option value="">Error al cargar</option>';
                    });
            } else {
                municipioSelect.innerHTML = '<option value="">Seleccione un Departamento primero</option>';
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        const departamentoSelect = document.getElementById("departamento_residencia");
        const municipioSelect = document.getElementById("municipio_residencia");

        departamentoSelect.addEventListener("change", function () {
            const departamentoId = this.value;
            municipioSelect.innerHTML = '<option value="">Cargando...</option>'; 

            if (departamentoId) {
                fetch("{{ route('visionarios.getmunicipios', ['codigo_departamento' => '__CODIGO__']) }}".replace('__CODIGO__', departamentoSelect.options[departamentoSelect.selectedIndex].dataset.codigo))
                    .then(response => response.json())
                    .then(data => {
                        municipioSelect.innerHTML = data.html; // 🔄 Inyectar HTML en el select
                    })
                    .catch(error => {
                        console.error("Error al cargar municipios:", error);
                        municipioSelect.innerHTML = '<option value="">Error al cargar</option>';
                    });
            } else {
                municipioSelect.innerHTML = '<option value="">Seleccione un Departamento primero</option>';
            }
        });
    });

    
// para precargar informacion 

document.addEventListener("DOMContentLoaded", function () {
    const departamentoSelect = document.getElementById("departamento_nacimiento");
    const municipioSelect = document.getElementById("municipio_nacimiento");

    const departamentoSeleccionado = "{{ $departamento_nacimiento ?? '' }}"; // Departamento guardado
    const municipioSeleccionado = "{{ $municipio_nacimiento ?? '' }}"; // Municipio guardado

    function cargarMunicipios() {
        const departamentoCodigo = departamentoSelect.options[departamentoSelect.selectedIndex]?.dataset.codigo;

        if (!departamentoCodigo) {
            municipioSelect.innerHTML = '<option value="">Seleccione un Departamento primero</option>';
            return;
        }

        fetch("{{ route('visionarios.getmunicipios', ['codigo_departamento' => '__CODIGO__']) }}".replace('__CODIGO__', departamentoCodigo))
            .then(response => response.json())
            .then(data => {
                municipioSelect.innerHTML = data.html;

                if (municipioSeleccionado) {
                    municipioSelect.value = municipioSeleccionado;
                    console.log("✅ Municipio seleccionado automáticamente:", municipioSeleccionado);
                }
            })
            .catch(error => {
                console.error("❌ Error al cargar municipios:", error);
                municipioSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    }

    // **Si hay un departamento seleccionado, cargamos municipios automáticamente**
    if (departamentoSeleccionado) {
        cargarMunicipios();
    }

    // **Si el usuario cambia el departamento, recargamos municipios**
  //  departamentoSelect.addEventListener("change", cargarMunicipios);
});


// precarga municipio 2 

document.addEventListener("DOMContentLoaded", function () {
    const departamentoSelect = document.getElementById("departamento_residencia");
    const municipioSelect = document.getElementById("municipio_residencia");

    const departamentoSeleccionado = "{{ $departamento_residencia ?? '' }}"; // Departamento guardado
    const municipioSeleccionado = "{{ $municipio_residencia ?? '' }}"; // Municipio guardado

    function cargarMunicipios() {
        const departamentoCodigo = departamentoSelect.options[departamentoSelect.selectedIndex]?.dataset.codigo;

        if (!departamentoCodigo) {
            municipioSelect.innerHTML = '<option value="">Seleccione un Departamento primero</option>';
            return;
        }

        fetch("{{ route('visionarios.getmunicipios', ['codigo_departamento' => '__CODIGO__']) }}".replace('__CODIGO__', departamentoCodigo))
            .then(response => response.json())
            .then(data => {
                municipioSelect.innerHTML = data.html;

                if (municipioSeleccionado) {
                    municipioSelect.value = municipioSeleccionado;
                    console.log("✅ Municipio seleccionado automáticamente:", municipioSeleccionado);
                }
            })
            .catch(error => {
                console.error("❌ Error al cargar municipios:", error);
                municipioSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    }

    // **Si hay un departamento seleccionado, cargamos municipios automáticamente**
    if (departamentoSeleccionado) {
        cargarMunicipios();
    }

    // **Si el usuario cambia el departamento, recargamos municipios**
  //  departamentoSelect.addEventListener("change", cargarMunicipios);
});



// fin para precargar informacion

 

</script>


<script>

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("municipio_residencia").addEventListener("change", function () {
        let municipioCodigo = this.value; // Código del municipio seleccionado
        let comunaSelect = document.getElementById("comuna_residencia");

        // Si no hay municipio seleccionado, limpiar el select y salir
        if (!municipioCodigo) {
            comunaSelect.innerHTML = '<option value="">Seleccione un Municipio primero</option>';
            return;
        }

        // Vaciar opciones y mostrar "Cargando..."
        comunaSelect.innerHTML = '<option value="">Cargando comunas...</option>';

        // Hacer la petición con fetch() a la ruta de Laravel
        fetch(`{{ route('visionarios.getcomunas', '') }}/${municipioCodigo}`)
            .then(response => response.json())
            .then(data => {
                // Verificar si hay un error
                if (data.error) {
                    comunaSelect.innerHTML = '<option value="">' + data.error + '</option>';
                    return;
                }

                // Insertar las opciones en el select
                comunaSelect.innerHTML = data;
            })
            .catch(error => {
                console.error('Error al obtener las comunas:', error);
                comunaSelect.innerHTML = '<option value="">Error al cargar comunas</option>';
            });
    });
});


// precargar comuna seleccionada 


document.addEventListener("DOMContentLoaded", function () {
    const municipioSelect = document.getElementById("municipio_residencia");
    const comunaSelect = document.getElementById("comuna_residencia");
    const municipioSeleccionado = "{{ $municipio_residencia ?? '' }}"; // Municipio guardado
    const comunaSeleccionada = "{{ $comuna_residencia ?? '' }}"; // Comuna guardada

    function cargarComunas() {
        let municipioCodigo = municipioSelect.value || municipioSeleccionado;

        if (!municipioCodigo) {
            comunaSelect.innerHTML = '<option value="">Seleccione un Municipio primero</option>';
            return;
        }

        comunaSelect.innerHTML = '<option value="">Cargando comunas...</option>';

        fetch(`{{ route('visionarios.getcomunas', '') }}/${municipioCodigo}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    comunaSelect.innerHTML = '<option value="">' + data.error + '</option>';
                    return;
                }

                comunaSelect.innerHTML = data; // Insertar las opciones

                if (comunaSeleccionada) {
                    comunaSelect.value = comunaSeleccionada; // Seleccionar la comuna guardada
                    console.log("✅ Comuna seleccionada automáticamente:", comunaSeleccionada);
                }
            })
            .catch(error => {
                console.error('❌ Error al obtener las comunas:', error);
                comunaSelect.innerHTML = '<option value="">Error al cargar comunas</option>';
            });
    }

    // **Precargar comunas si hay un municipio seleccionado**
    if (municipioSeleccionado) {
        cargarComunas();
    }

    // **Actualizar comunas cuando el usuario cambie el municipio**
    // municipioSelect.addEventListener("change", cargarComunas);
});



// fin precargar comuna seleccionada
</script>


<script>

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("comuna_residencia").addEventListener("change", function () {
        let comunaCodigo = this.value; // Código de la comuna seleccionada
        let barrioSelect = document.getElementById("barrio_residencia");

        // Si no hay comuna seleccionada, limpiar el select y salir
        if (!comunaCodigo) {
            barrioSelect.innerHTML = '<option value="">Seleccione una Comuna primero</option>';
            return;
        }

        // Vaciar opciones y mostrar "Cargando..."
        barrioSelect.innerHTML = '<option value="">Cargando barrios...</option>';

        // Hacer la petición con fetch() a la ruta de Laravel
        fetch(`{{ route('visionarios.getbarrios', '') }}/${comunaCodigo}`)
            .then(response => response.json())
            .then(data => {
                // Verificar si hay un error
                if (data.error) {
                    barrioSelect.innerHTML = '<option value="">' + data.error + '</option>';
                    return;
                }

                // Insertar las opciones en el select
                barrioSelect.innerHTML = data;
            })
            .catch(error => {
                console.error('Error al obtener los barrios:', error);
                barrioSelect.innerHTML = '<option value="">Error al cargar barrios</option>';
            });
    });
});


//barrios precargados


// fin barrios precargados

document.addEventListener("DOMContentLoaded", function () {
    const comunaSelect = document.getElementById("comuna_residencia");
    const barrioSelect = document.getElementById("barrio_residencia");
    const comunaSeleccionada = "{{ $comuna_residencia ?? '' }}"; // Comuna guardada
    const barrioSeleccionado = "{{ $barrio_residencia ?? '' }}"; // Barrio guardado

    function cargarBarrios() {
        let comunaCodigo = comunaSelect.value || comunaSeleccionada;

        if (!comunaCodigo) {
            barrioSelect.innerHTML = '<option value="">Seleccione una Comuna primero</option>';
            return;
        }

        barrioSelect.innerHTML = '<option value="">Cargando barrios...</option>';

        fetch(`{{ route('visionarios.getbarrios', '') }}/${comunaCodigo}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    barrioSelect.innerHTML = '<option value="">' + data.error + '</option>';
                    return;
                }

                barrioSelect.innerHTML = data; // Insertar las opciones

                if (barrioSeleccionado) {
                    barrioSelect.value = barrioSeleccionado; // Seleccionar el barrio guardado
                    console.log("✅ Barrio seleccionado automáticamente:", barrioSeleccionado);
                }
            })
            .catch(error => {
                console.error('❌ Error al obtener los barrios:', error);
                barrioSelect.innerHTML = '<option value="">Error al cargar barrios</option>';
            });
    }

    // **Precargar barrios si hay una comuna seleccionada**
    if (comunaSeleccionada) {
        cargarBarrios();
    }

    // **Actualizar barrios cuando el usuario cambie la comuna**
  //  comunaSelect.addEventListener("change", cargarBarrios);


  if($('#municipio_residencia').val() != '1'){


// $('#comuna_residencia').val('');
 $('#comuna_residencia').removeAttr('required');
 $('#comuna_residenciadiv').hide();

//  $('#barrio_residencia').val('');
 $('#barrio_residencia').removeAttr('required');
 $('#barrio_residenciadiv').hide();



 }else{

 $('#comuna_residencia').attr('required','required');
//  $('#comuna_residencia').val('');
 $('#comuna_residenciadiv').show();

 $('#barrio_residencia').attr('required','required');
//  $('#barrio_residencia').val('');
 $('#barrio_residenciadiv').show();
}
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    if($('#pais_nacimiento').val() != '1'){
       // $('#departamento_nacimiento').val('');
        $('#departamento_nacimiento').removeAttr('required');
        $('#departamento_nacimientodiv').hide();

      //  $('#municipio_nacimiento').val('');
        $('#municipio_nacimiento').removeAttr('required');
        $('#municipio_nacimientodiv').hide();

        
    }else{
        $('#departamento_nacimiento').attr('required','required');
       // $('#departamento_nacimiento').val('');
        $('#departamento_nacimientodiv').show();

        $('#municipio_nacimiento').attr('required','required');
      //  $('#municipio_nacimiento').val('');
        $('#municipio_nacimientodiv').show();
    }


    if($('#pais_residencia').val() != '1'){
      //  $('#departamento_residencia').val('');
        $('#departamento_residencia').removeAttr('required');
        $('#departamento_residenciadiv').hide();

      //  $('#municipio_residencia').val('');
        $('#municipio_residencia').removeAttr('required');
        $('#municipio_residenciadiv').hide();

      //  $('#comuna_residencia').val('');
        $('#comuna_residencia').removeAttr('required');
        $('#comuna_residenciadiv').hide();

      //  $('#barrio_residencia').val('');
        $('#barrio_residencia').removeAttr('required');
        $('#barrio_residenciadiv').hide();

        
        
    }else{
        $('#departamento_residencia').attr('required','required');
      //  $('#departamento_residencia').val('');
        $('#departamento_residenciadiv').show();

        $('#municipio_residencia').attr('required','required');
     //   $('#municipio_residencia').val('');
        $('#municipio_residenciadiv').show();

        $('#comuna_residencia').attr('required','required');
      //  $('#comuna_residencia').val('');
        $('#comuna_residenciadiv').show();

        $('#barrio_residencia').attr('required','required');
      //  $('#barrio_residencia').val('');
        $('#barrio_residenciadiv').show();
    }

    if($('#departamento_residencia').val() != '1'){


              //  $('#comuna_residencia').val('');
                $('#comuna_residencia').removeAttr('required');
                $('#comuna_residenciadiv').hide();

              //  $('#barrio_residencia').val('');
                $('#barrio_residencia').removeAttr('required');
                $('#barrio_residenciadiv').hide();



            }else{

                $('#comuna_residencia').attr('required','required');
               // $('#comuna_residencia').val('');
                $('#comuna_residenciadiv').show();

                $('#barrio_residencia').attr('required','required');
             //   $('#barrio_residencia').val('');
                $('#barrio_residenciadiv').show();
            }

       
    // if($('#edad').val() <= '17'){
    //        // $('#nombre_tutor').val('');
    //         // $('#comuna_residencia').removeAttr('required');
    //         $('#nombre_tutordiv').show();  
    //       //  $('#tipodocumento_tutor').val('');
    //         $('#tipodocumento_tutordiv').show(); 
    //         $('#tipodocumento_tutor').attr('required','required');


    //       //  $('#documento_tutor').val('');
    //         $('#documento_tutordiv').show(); 

    //       //  $('#telefono_tutor').val('');
    //         $('#telefono_tutordiv').show(); 

    //       //  $('#correo_tutor').val('');
    //         $('#correo_tutordiv').show(); 
    // }else{
    //         $('#nombre_tutor').val('NO APLICA');
    //         // $('#comuna_residencia').removeAttr('required');
    //         $('#nombre_tutordiv').hide(); 

    //         $('#tipodocumento_tutor').val('NO APLICA');
    //         $('#tipodocumento_tutordiv').hide();  
    //         $('#documento_tutor').val('NO APLICA');
    //         $('#documento_tutordiv').hide(); 
    //         $('#documento_tutor').removeAttr('required');
    //         $('#tipodocumento_tutor').removeAttr('required');
    //         $('#correo_tutor').removeAttr('required');
            
    //         $('#telefono_tutor').val('NO APLICA');
    //         $('#telefono_tutordiv').hide(); 

    //         $('#correo_tutor').val('NO APLICA');
    //         $('#correo_tutordiv').hide(); 
    // }


    if($('#edad').val() <= '17'){
        $('#nombre_tutordiv').show();  
        $('#tipodocumento_tutordiv').show(); 
        $('#tipodocumento_tutor').attr('required','required');
        $('#documento_tutordiv').show(); 
        $('#telefono_tutordiv').show(); 
        $('#correo_tutordiv').show(); 

        }else{
        $('#nombre_tutor').val('NO APLICA');
        $('#nombre_tutordiv').hide(); 
        $('#tipodocumento_tutor').val('NO APLICA');
        $('#tipodocumento_tutordiv').hide();  
        $('#documento_tutor').val('NO APLICA');
        $('#documento_tutordiv').hide(); 
        $('#tipodocumento_tutor').removeAttr('required');
        $('#telefono_tutor').val('NO APLICA');
        $('#telefono_tutordiv').hide(); 
        $('#correo_tutor').val('NO APLICA');
        $('#correo_tutordiv').hide(); 



        $('#documento_tutor').removeAttr('required');
        $('#correo_tutor').removeAttr('required');
        }


        if($('#como_entero').val() != '10'){
            $('#otro_cual').val('');
            $('#otro_cual').removeAttr('required');
            $('#otro_cualdiv').hide();
            
        }else{
            $('#otro_cual').attr('required','required');
           // $('#otro_cual').val('');
            $('#otro_cualdiv').show();
        }

});





</script>

<script>
    $(document).ready(function () {
    function validarLGBTIQ() {
        let sexo = $("#sexo").val(); 
        let identidadGenero = $("#identidad_genero").val(); 
        let orientacionSexual = $("#orientacion_sexual").val(); 

        // Convertir orientación sexual a un array si es múltiple
        let orientacionesSeleccionadas = Array.isArray(orientacionSexual) ? orientacionSexual : [orientacionSexual];

        // Validaciones según la imagen:
        if (
            (sexo == "1" && (identidadGenero == "3" || identidadGenero == "5")) || 
            (sexo == "2" && (identidadGenero == "3" || identidadGenero == "5")) || 
            orientacionesSeleccionadas.includes("2") || 
            orientacionesSeleccionadas.includes("3") || 
            orientacionesSeleccionadas.includes("5")
        ) {
            $("#lgbtiq").val("SI");
            $("#lgbtiqdiv").show();
            
        } else {
            $("#lgbtiq").val("NO");
            $("#lgbtiqdiv").hide();
        }
    }

    validarLGBTIQ();

    // Eventos onchange para los select
    $("#sexo, #identidad_genero, #orientacion_sexual").change(validarLGBTIQ);
});

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
        $(document).ready(function() {
            $('#uploadFormCuenta').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let documento = '<?= $documento ?>'; // Obtener el documento desde el atributo
                let periodo = '<?= $periodo ?>'; // Obtener el periodo desde el atributo

            // Agregar documento y periodo al FormData
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
                        $('#mensajeOk').text(response.mensaje);
                        if (response.file) {
                            $('#archivoSubidoCuenta').html('<a href="' +response.file + '" target="_blank">Ver documento</a>');
                            $('#verCuenta').html('<a href="' +response.file + '" target="_blank">Ver documento</a>');
                            $('#adjuntarCuenta').css('display','none');
                        }
                    },
                    error: function(xhr) {
                        $('#mensajeNoOk').text('Error al subir el archivo.');
                    }
                });
            });
        });
    </script>
<script>
//     function validarCorreo() {
//     var correo = document.getElementById("correo").value.trim();
//     var confirmaCorreo = document.getElementById("confirma_correo").value.trim();

//     if (correo !== confirmaCorreo) {
//         alert("Los correos electrónicos no coinciden.");
//         return false; // Evita el envío del formulario
//     }
//     return true; // Permite el envío si los correos son iguales
// }

function validarCorreosIguales() {
    var correo = document.getElementById("correo").value.trim().toLowerCase(); // Convertir a minúsculas
    var confirmaCorreo = document.getElementById("confirma_correo");
    var confirmaValor = confirmaCorreo.value.trim().toLowerCase(); // Convertir a minúsculas
    var errorMensaje = document.getElementById("errorCorreo");

    if (correo !== confirmaValor) {
        errorMensaje.style.display = "block"; // Muestra mensaje de error
        confirmaCorreo.setCustomValidity("Los correos no coinciden");
        return false;
    } else {
        errorMensaje.style.display = "none"; // Oculta mensaje de error
        confirmaCorreo.setCustomValidity("");
        return true;
    }
}


</script>
<script>


document.addEventListener("DOMContentLoaded", function () {
    let selectSexo = document.getElementById("sexo");
    let selectIdentidad = document.getElementById("identidad_genero");
    let selectOrientacion = document.getElementById("orientacion_sexual");

    // Relación entre Sexo -> Identidad de Género
    const identidadGeneroPorSexo = {
        1: [2, 5, 1], // Hombre -> Hombre Cis, Mujer Trans, Género Fluido
        2: [4, 3, 1], // Mujer -> Mujer Cis, Hombre Trans, Género Fluido
        3: [4, 2, 5, 3] // Intersexual -> Mujer Cis, Hombre Cis, Mujer Trans, Hombre Trans
    };

    // Relación entre Identidad de Género -> Orientación Sexual
    const orientacionPorIdentidad = {
        2: [3, 2, 6, 1, 4], // Hombre Cis -> Gay, Bisexual, Pansexual, Asexual, Heterosexual
        3: [3, 2, 6, 1, 4], // Hombre Trans -> Gay, Bisexual, Pansexual, Asexual, Heterosexual
        4: [5, 2, 6, 1, 4], // Mujer Cis -> Lesbiana, Bisexual, Pansexual, Asexual, Heterosexual
        5: [5, 2, 6, 1, 4], // Mujer Trans -> Lesbiana, Bisexual, Pansexual, Asexual, Heterosexual
        1: [5, 3, 2, 6, 1, 4] // Género Fluido -> Lesbiana, Gay, Bisexual, Pansexual, Asexual, Heterosexual
    };

    // Opciones de Identidad de Género
    const identidades = {
        1: "Género Fluido",
        2: "Hombre Cis",
        3: "Hombre Trans",
        4: "Mujer Cis",
        5: "Mujer Trans"
    };

    // Opciones de Orientación Sexual
    const orientaciones = {
        1: "Asexual",
        2: "Bisexual",
        3: "Gay",
        4: "Heterosexual",
        5: "Lesbiana",
        6: "Pansexual"
    };

    // Función para cargar Identidades de Género según el Sexo seleccionado
    function cargarIdentidades(sexoId, preseleccion = null, esOnLoad = false) {
        selectIdentidad.innerHTML = '<option value="">Seleccione una opción</option>';
        
        if (identidadGeneroPorSexo[sexoId]) {
            identidadGeneroPorSexo[sexoId].forEach(id => {
                let option = document.createElement("option");
                option.value = id;
                option.textContent = identidades[id];
                selectIdentidad.appendChild(option);
            });
        }

        // Si hay identidad preseleccionada, aplicarla después de filtrar
        if (preseleccion) {
            selectIdentidad.value = preseleccion;
        }

        // Si hay identidad preseleccionada, cargar orientaciones
        cargarOrientaciones(selectIdentidad.value, selectOrientacion.dataset.selected, esOnLoad);
    }

    // Función para cargar Orientaciones Sexuales según la Identidad de Género seleccionada
    function cargarOrientaciones(identidadId, preseleccion = null, esOnLoad = false) {
        selectOrientacion.innerHTML = '<option value="">Seleccione una opción</option>';
        
        if (orientacionPorIdentidad[identidadId]) {
            orientacionPorIdentidad[identidadId].forEach(id => {
                let option = document.createElement("option");
                option.value = id;
                option.textContent = orientaciones[id];
                selectOrientacion.appendChild(option);
            });
        }

        // Si hay orientación preseleccionada, aplicarla después de filtrar
        if (preseleccion) {
            selectOrientacion.value = preseleccion;
        }
    }

    // Manejar cambio en select de Sexo
    selectSexo.addEventListener("change", function () {
        cargarIdentidades(this.value, null, false);
    });

    // Manejar cambio en select de Identidad de Género
    selectIdentidad.addEventListener("change", function () {
        cargarOrientaciones(this.value, null, false);
    });

    // **PRESELECCIONAR VALORES AL CARGAR LA PÁGINA**
    if (selectSexo.value) {
        let identidadGuardada = "{{ $identidad_genero }}";
        let orientacionGuardada = "{{ $orientacion_sexual }}";

        cargarIdentidades(selectSexo.value, identidadGuardada, true);
        cargarOrientaciones(identidadGuardada, orientacionGuardada, true);
    }
});





//     document.addEventListener("DOMContentLoaded", function () {
//     // Obtener referencias a los selects
//     let selectSexo = document.getElementById("sexo");
//     let selectIdentidad = document.getElementById("identidad_genero");
//     let selectOrientacion = document.getElementById("orientacion_sexual");

//     // Relación entre Sexo -> Identidad de Género
//     const identidadGeneroPorSexo = {
//         1: [2, 5, 1], // Hombre -> Hombre Cis, Mujer Trans, Género Fluido
//         2: [4, 3, 1], // Mujer -> Mujer Cis, Hombre Trans, Género Fluido
//         3: [4, 2, 5, 3] // Intersexual -> Mujer Cis, Hombre Cis, Mujer Trans, Hombre Trans
//     };

//     // Relación entre Identidad de Género -> Orientación Sexual
//     const orientacionPorIdentidad = {
//         2: [3, 2, 6, 1, 4], // Hombre Cis -> Gay, Bisexual, Pansexual, Asexual, Heterosexual
//         3: [3, 2, 6, 1, 4], // Hombre Trans -> Gay, Bisexual, Pansexual, Asexual, Heterosexual
//         4: [5, 2, 6, 1, 4], // Mujer Cis -> Lesbiana, Bisexual, Pansexual, Asexual, Heterosexual
//         5: [5, 2, 6, 1, 4], // Mujer Trans -> Lesbiana, Bisexual, Pansexual, Asexual, Heterosexual
//         1: [5, 3, 2, 6, 1, 4] // Género Fluido -> Lesbiana, Gay, Bisexual, Pansexual, Asexual, Heterosexual
//     };

//     // Opciones de Identidad de Género
//     const identidades = {
//         1: "Género Fluido",
//         2: "Hombre Cis",
//         3: "Hombre Trans",
//         4: "Mujer Cis",
//         5: "Mujer Trans"
//     };

//     // Opciones de Orientación Sexual
//     const orientaciones = {
//         1: "Asexual",
//         2: "Bisexual",
//         3: "Gay",
//         4: "Heterosexual",
//         5: "Lesbiana",
//         6: "Pansexual"
//     };

//     // Manejar cambio en select de Sexo
//     selectSexo.addEventListener("change", function () {
//         let sexoId = parseInt(this.value);
//         selectIdentidad.innerHTML = '<option value="">Seleccione una opcion</option>';
//         selectOrientacion.innerHTML = '<option value="">Seleccione una opcion</option>'; // Limpiar orientación

//         if (identidadGeneroPorSexo[sexoId]) {
//             identidadGeneroPorSexo[sexoId].forEach(id => {
//                 let option = document.createElement("option");
//                 option.value = id;
//                 option.textContent = identidades[id];
//                 selectIdentidad.appendChild(option);
//             });
//         }
//     });

//     // Manejar cambio en select de Identidad de Género
//     selectIdentidad.addEventListener("change", function () {
//         let identidadId = parseInt(this.value);
//         selectOrientacion.innerHTML = '<option value="">Seleccione una opcion</option>'; // Limpiar orientación

//         if (orientacionPorIdentidad[identidadId]) {
//             orientacionPorIdentidad[identidadId].forEach(id => {
//                 let option = document.createElement("option");
//                 option.value = id;
//                 option.textContent = orientaciones[id];
//                 selectOrientacion.appendChild(option);
//             });
//         }
//     });
// });

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

        const porcentajeProgreso = (camposCompletados / totalCampos) * 25; // Máximo 25%
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