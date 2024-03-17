3<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
</head>
<body>
<a href="lista/create">crear nuevo </a> |
<a href="/principal">Regresar a pagina principal</a>
    <h1>Lista de deseos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Juego</th>
                <th>Precio</th>
                <th>Oferta</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listas as $lista)
                <tr>
                    <td>{{ $lista->name }}</td>
                    <td>{{ $lista->nombre_juego }}</td>
                    <td>{{ $juego->precio }}</td>
                    <td>{{ $juego->oferta }}</td>
                    <td>{{ $juego->disponible }}</td>
                    <td>
                    <a href="{{ route('listas.show', $lista) }}">Ver juegos </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>