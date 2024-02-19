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
        <input type="text" name="tipo_plataforma"value=" {{old('tipo_plataforma')}} ">
        @error('tipo_plataforma') 
<div class=”alert alert-danger”> {{$message}}</div>
@enderror

        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>