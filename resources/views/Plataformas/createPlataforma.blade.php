<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Plataforma</title>
</head>
<body>
    <a href="/principal">Regresar a pagina principal</a> |
    <a href="/plataforma">ver listado</a> 
    <h1>Formulario de Videojuegos</h1>
    
    <hr>
    
    <form action="/plataforma" method="POST">
        @csrf
        <label for="nombre_plataforma">Nombre de la Plataforma:</label>
        <input type="text" name="nombre_plataforma"value=" {{old('nombre_plataforma')}} "> 
        @error('nombre_plataforma') 
<div class=”alert alert-danger”> {{$message}}</div>
@enderror

        <br><br>

        <label for="tipo_plataforma">Tipo de Plataforma:</label>
        <select name="tipo_plataforma">
        <option value="Play Station" {{ old('tipo_plataforma') == 'Play Station' ? 'selected' : '' }}>Play Station</option>
        <option value="Xbox" {{ old('tipo_plataforma') == 'Xbox' ? 'selected' : '' }}>Xbox</option>
        <option value="Nintendo" {{ old('tipo_plataforma') == 'Nintendo' ? 'selected' : '' }}>Nintendo</option>
        <option value="Windows" {{ old('tipo_plataforma') == 'Windows' ? 'selected' : '' }}>Windows</option>
        <option value="Linux" {{ old('tipo_plataforma') == 'Linux' ? 'selected' : '' }}>Linux</option>
        <option value="MacOS" {{ old('tipo_plataforma') == 'MacOS' ? 'selected' : '' }}>MacOS</option>
        <option value="Android" {{ old('tipo_plataforma') == 'Android' ? 'selected' : '' }}>Android</option>
        <option value="iOS" {{ old('tipo_plataforma') == 'iOS' ? 'selected' : '' }}>iOS</option>
        </select>
        @error('tipo_plataforma') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror

        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>