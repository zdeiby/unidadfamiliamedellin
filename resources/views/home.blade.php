@extends('layouts.app')

@section('content')
<div style="position: relative; text-align: center; color: white; height: 100vh; overflow: hidden; background: url('{{ asset('imagenes/edificiosapiencia.jpg') }}') no-repeat center center; background-size: cover;">
    <!-- Contenido superpuesto -->
    <div style="position: relative; top: 50%; transform: translateY(-50%); background: rgba(0, 0, 0, 0.5); padding: 40px; border-radius: 10px; max-width: 800px; margin: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <label style="font-size: 2.0rem; font-weight: bold; margin-bottom: 20px;">¡Hola, {{ Auth::user()->name }}! 👋</label>
        <p style="font-size: 1.2rem; margin-bottom: 20px;">Bienvenido al sistema de gestión de La Unidad Familia Medellín.</p>
        <p style="font-size: 1.2rem; margin-bottom: 20px;">Aquí podrás administrar usuarios, gestionar proyectos, crear reuniones entre otras cosas.</p>
    </div>
</div>
@endsection
