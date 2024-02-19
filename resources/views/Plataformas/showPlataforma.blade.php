<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infor comentario</title>
</head>
<body>
    <h1>Plataforma ID {{ $plataforma->id }} </h1>
        <ul>
            <li>nombre: {{ $plataforma->nombre_plataforma }}</li>
            <li>tipo: {{ $plataforma->tipo_plataforma }}</li>
            <li>
            <a href="{{ route('plataforma.edit', $plataforma) }} ">editar </a> |
            <a href="{{ route('plataforma.index', $plataforma) }} ">Volver </a> |
            <form action="{{ route('plataforma.destroy', $plataforma) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>

            </li>
        </ul>
</body>
</html>