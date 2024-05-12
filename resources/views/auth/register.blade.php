<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .container-fluid {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .content {
                flex: 1 0 auto;
            }
            footer {
                flex-shrink: 0;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
            .bg-custom {
                background-color: #CCCCCC; /* Color gris */
            }
    </style>

</head>
<body class="bg-custom">
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Cambiar la clase 'navbar-light' a 'navbar-dark' y 'bg-light' a 'bg-dark' -->
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/principal">GAMESTORE DC</a>

                <!-- Botón para dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
   
     <h1>Crear cuenta</h1>
        @include('parciales.formError')
        <form  action="{{ route('register') }}" method="post">
            @csrf
          
            <div>
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <div>
                <button type="submit">Registrarse</button>
            </div>
    <form>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>