<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

        .bg-custom {
            background-color: #CCCCCC; /* Color gris */
        }
    </style>
</head>
<body class="bg-custom">
    <title>Formulario Juegos</title>
</head>
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
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/juego">ver listado</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Formulario de Videojuegos</h1>

    <hr>
    @include('parciales.formError')
    <form action="/juego" method="POST">
        @csrf
        <label for="nombre_juego">Nombre del Videojuego:</label>
        <input type="text" name="nombre_juego" value=" {{old('nombre_juego')}} ">
        <br><br>

        <label for="genero">Género:</label>
<select name="genero" id="genero">
    <option value="accion" {{ old('genero') == 'accion' ? 'selected' : '' }}>Acción</option>
    <option value="aventura" {{ old('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
    <option value="rpg" {{ old('genero') == 'rpg' ? 'selected' : '' }}>Rol/RPG</option>
    <option value="deportes" {{ old('genero') == 'deportes' ? 'selected' : '' }}>Deportes</option>
    <option value="carreras" {{ old('genero') == 'carreras' ? 'selected' : '' }}>Carrera</option>
    <option value="lucha" {{ old('genero') == 'lucha' ? 'selected' : '' }}>Lucha</option>
    <option value="disparos" {{ old('genero') == 'disparos' ? 'selected' : '' }}>Disparos</option>
    <option value="terror" {{ old('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
    <option value="simulacion" {{ old('genero') == 'simulacion' ? 'selected' : '' }}>Simulación</option>
</select>
<br><br>

<label for="edad">Edad Recomendada:</label>
<input type="number" name="edad" step="1" style="width: 40px;" value="{{ old('edad', 6) }}">
<br><br>

<label>Plataformas:</label><br>
@foreach($plataformas as $plataforma)
    <input type="checkbox" id="{{ $plataforma->nombre_plataforma }}" name="plataforma[]" value="{{ $plataforma->nombre_plataforma }}" {{ in_array($plataforma->nombre_plataforma, old('plataforma', [])) ? 'checked' : '' }}>
    <label for="{{ $plataforma->nombre_plataforma }}">{{ $plataforma->nombre_plataforma }}</label><br>
@endforeach
<br>

<label for="precio">Precio en pesos (MXN):</label>
<input type="number" name="precio" step="10" style="width: 55px;" value="{{ old('precio', 999) }}">
<br><br>

<label for="desarrolladora">Desarrolladora del Videojuego:</label>
<input type="text" name="desarrolladora" value="{{ old('desarrolladora') }}">
<br><br>

<label for="release_year">Año de lanzamiento:</label>
<input type="number" name="release_year" step="1" style="width: 55px;" value="{{ old('release_year', 2000) }}">
<br><br>


        <input type="submit" value="Enviar">
    </form>
        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>