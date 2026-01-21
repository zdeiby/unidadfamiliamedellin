<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row" style="margin: 0; height: 100vh;">
    <!-- Columna izquierda: Login -->
    <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="container">
            <div class="text-center mb-4">
                <img  alt="Escudo Alcaldía" src="{{ secure_asset('imagenes/logo-sapiencia-alc.png') }}" width="30%">
            </div>
            <div class="container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- Token CSRF de Laravel para proteger el formulario -->

                    <!-- Campo Email -->
                    <div class="form-group mb-3">
                        <label for="email">Usuario</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingresa tu usuario">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <!-- Campo Contraseña -->
                    <div class="form-group mb-3">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresa tu clave de acceso">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>

                    <!-- Botón Recordar -->
                    <div class="form-group mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-block">
                            Validar Acceso
                        </button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Restablecer contraseña
                        </a>
                        @endif
                        <!-- <span>|</span> -->
                            @if (Route::has('register'))
                                 <a class="btn btn-link text-success" href="{{ route('register') }}">
                                    <i class="bi bi-pencil-square"></i> Registrarse
                                </a> 
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <!-- Columna derecha: Imagen -->
    <div class="col-md-6" style="background: url('{{ secure_asset('imagenes/fondoacceso.jpg') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover;"
    >
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
