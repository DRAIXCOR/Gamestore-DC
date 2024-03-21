<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Lista</title>
</head>
<body>
    <a href="/principal">Regresar a pagina principal</a> |
    <a href="/lista">ver listado</a> 
    <h1>Formulario de Lista</h1>

    <hr>
    @include('parciales.formError')
    <form action="{{ route('lista.update', $lista) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="name">Nombre del Usuario:</label>
        <input type="text" name="name" value=" {{ $}} ">
        @error('Nombre del Usuario') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <label for="nombre_juego">Nombre del Videojuego:</label>
        <input type="text" name="nombre_juego" value=" {{old('nombre_juego')}} ">
        @error('Nombre del juego') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>
        

        <label for="precio">Precio en pesos (MXN):</label>
        <input type="number" name="precio" step="1" style="width: 55px;" value="{{ old('precio') }}">
        <br><br>
        @error('Precio en pesos') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        
        <label for="oferta">Oferta:</label>
        <select name="oferta" id="oferta">
            <option value="No" {{ old('oferta') == 'No' ? 'selected' : '' }}>No</option>
            <option value="20%" {{ old('oferta') == '20%' ? 'selected' : '' }}>20%</option>
            <option value="50%" {{ old('oferta') == '50%' ? 'selected' : '' }}>50%</option>
            <option value="99%" {{ old('oferta') == '99%' ? 'selected' : '' }}>99%</option>
        </select>
        @error('Oferta') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <label for="Disponible">Oferta:</label>
        <select name="disponible" id="disponible">
            <option value="Si" {{ old('disponible') == 'Si' ? 'selected' : '' }}>Disponible</option>
            <option value="No" {{ old('disponible') == 'No' ? 'selected' : '' }}>No disponible</option>
        </select>
        @error('Disponible') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
