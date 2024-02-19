<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infor comentario</title>
</head>
<body>

    <h1>juego ID {{ $juego->id }} </h1>
        <ul>
            <li>nombre: {{ $juego->nombre_juego }}</li>
            <li>genero: {{ $juego->genero}}</li>
            <li>edad: {{ $juego->edad}}</li>
            <li>plataforma: {{ $juego->plataforma}}</li>
            <li>precio: {{ $juego->precio}}</li>
            <li>desarrolladora: {{ $juego->desarrolladora}}</li>
            <li>año: {{ $juego->release_year}}</li>
           
    <li>
        <a href="{{ route('juego.edit', $juego) }}">Editar </a> |
        <a href="{{ route('juego.index', $juego) }}">Volver </a>
        <form action="{{ route('juego.destroy', $juego) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>
    </li>


            </li>
        </ul>
</body>
</html>