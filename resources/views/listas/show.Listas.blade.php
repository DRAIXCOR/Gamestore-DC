<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infor comentario</title>
</head>
<body>

    <h1>Lista ID {{ $lista->id }} </h1>
        <ul>
            <li>Usuario: {{ $lista->name }}</li>
            <li>Juego: {{ $lista->nombre_juego }}</li>
            <li>Precio: {{ $lista->precio}}</li>
            <li>Oferta: {{ $lista->oferta}}</li>
            <li>Disponible: {{ $lista->dsiponible}}</li>
           
    <li>
        <a href="{{ route('listas.edit', $lista) }}">Editar </a> |
        <a href="{{ route('listas.index', $lista) }}">Volver </a>
        <form action="{{ route('listas.destroy', $lista) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>
    </li>
            </li>
        </ul>
</body>
</html>