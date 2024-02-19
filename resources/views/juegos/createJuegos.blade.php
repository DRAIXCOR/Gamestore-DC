<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Juegos</title>
</head>
<body>
    <a href="/principal">Regresar a pagina principal</a> |
    <a href="/juego">ver listado</a> 
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
<input type="number" name="edad" step="1" style="width: 40px;" value="{{ old('edad') }}">
<br><br>

<label>Plataformas:</label><br>
<input type="checkbox" id="ps4" name="plataforma[]" value="ps4" {{ in_array('ps4', old('plataforma', [])) ? 'checked' : '' }}>
<label for="ps4"> PlayStation 4</label><br>

<input type="checkbox" id="xbox" name="plataforma[]" value="xbox" {{ in_array('xbox', old('plataforma', [])) ? 'checked' : '' }}>
<label for="xbox"> Xbox</label><br>

<input type="checkbox" id="switch" name="plataforma[]" value="switch" {{ in_array('switch', old('plataforma', [])) ? 'checked' : '' }}>
<label for="switch"> Nintendo Switch</label><br>

<input type="checkbox" id="pc" name="plataforma[]" value="pc" {{ in_array('pc', old('plataforma', [])) ? 'checked' : '' }}>
<label for="pc"> PC</label>
<br><br>

<label for="precio">Precio en pesos (MXN):</label>
<input type="number" name="precio" step="1" style="width: 55px;" value="{{ old('precio') }}">
<br><br>

<label for="desarrolladora">Desarrolladora del Videojuego:</label>
<input type="text" name="desarrolladora" value="{{ old('desarrolladora') }}">
<br><br>

<label for="release_year">Año de lanzamiento:</label>
<input type="number" name="release_year" step="1" style="width: 55px;" value="{{ old('release_year', 2000) }}">
<br><br>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>