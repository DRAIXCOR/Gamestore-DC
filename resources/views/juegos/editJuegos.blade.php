<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Juegos</title>
</head>
<body>
    <h1>Formulario de Videojuegos</h1>

    <hr>
    @include('parciales.formError')
    <form action="{{ route('juego.update', $juego) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre_juego">Nombre del Videojuego:</label>
        <input type="text" name="nombre_juego" value=" {{ $juego->nombre_juego}} ">
        <br><br>

        <label for="genero">Género:</label>
<select name="genero" id="genero">
    <option value="accion" {{ old('genero', $juego->genero) === 'accion' ? 'selected' : '' }}>Acción</option>
    <option value="aventura" {{ old('genero', $juego->genero) === 'aventura' ? 'selected' : '' }}>Aventura</option>
    <option value="rpg" {{ old('genero', $juego->genero) === 'rpg' ? 'selected' : '' }}>Rol/RPG</option>
    <option value="deportes" {{ old('genero', $juego->genero) === 'deportes' ? 'selected' : '' }}>Deportes</option>
    <option value="carreras" {{ old('genero', $juego->genero) === 'carreras' ? 'selected' : '' }}>Carrera</option>
    <option value="lucha" {{ old('genero', $juego->genero) === 'lucha' ? 'selected' : '' }}>Lucha</option>
    <option value="disparos" {{ old('genero', $juego->genero) === 'disparos' ? 'selected' : '' }}>Disparos</option>
    <option value="terror" {{ old('genero', $juego->genero) === 'terror' ? 'selected' : '' }}>Terror</option>
    <option value="simulacion" {{ old('genero', $juego->genero) === 'simulacion' ? 'selected' : '' }}>Simulación</option>
</select>

        <br><br>

        <label for="edad">Edad Recomendada:</label>
        <input type="number" name="edad" step="1" style="width: 40px;"  value="{{ old('edad', $juego->edad) }}">
        <br><br>

        <label>Plataformas:</label><br>
        <input type="checkbox" id="ps4" name="plataforma[]" value="ps4" {{ in_array('ps4', old('plataforma', explode(', ', $juego->plataforma))) ? 'checked' : '' }}>
        <label for="ps4"> PlayStation 4</label><br>

        <input type="checkbox" id="xbox" name="plataforma[]" value="xbox" {{ in_array('xbox', old('plataforma', explode(', ', $juego->plataforma))) ? 'checked' : '' }}>
        <label for="xbox"> Xbox</label><br>


        <input type="checkbox" id="switch" name="plataforma[]" value="switch" {{ in_array('switch', old('plataforma', explode(', ', $juego->plataforma))) ? 'checked' : '' }}>
        <label for="switch"> Nintendo Switch</label><br>

        <input type="checkbox" id="pc" name="plataforma[]" value="pc" {{ in_array('pc', old('plataforma', explode(', ', $juego->plataforma))) ? 'checked' : '' }}>
        <label for="pc"> PC</label>
        <br><br>

        <label for="precio">Precio en pesos (MXN):</label>
        <input type="number" name="precio" step="1" style="width: 55px;" value="{{ old('precio', $juego->precio) }}">
        <br><br>

        <label for="desarrolladora">Desarrolladora del Videojuego:</label>
        <input type="text" name="desarrolladora" value="{{ old('desarrolladora', $juego->desarrolladora) }}">
        <br><br>

        <label for="release_year">Año de lanzamiento:</label>
        <input type="number" name="release_year" step="1" style="width: 55px;" value="{{ old('release_year', $juego->release_year) }}">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>