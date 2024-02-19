<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editar</title>
</head>
<body>
    <h1>Editar comentario</h1>
   
    <hr>
    
    <form action="{{ route('plataforma.update', $plataforma) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre_plataforma">Nombre de la Plataforma:</label>
        <input type="text" name="nombre_plataforma" value=" {{ $plataforma->nombre_plataforma}} ">
        @error('nombre_plataforma') 
        <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <label for="tipo_plataforma">Tipo de Plataforma:</label>
        <input type="text" name="tipo_plataforma" value=" {{ $plataforma->tipo_plataforma}} ">
        @error('tipo_plataforma') 
        <div class=”alert alert-danger”> {{$message}}</div>
        @enderror       
        <br><br>
      

        <input type="submit" value="Enviar">
    </form>
</body>
</html>