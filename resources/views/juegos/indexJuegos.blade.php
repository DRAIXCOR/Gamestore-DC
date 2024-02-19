<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
</head>
<body>
<a href="juego/create">crear nuevo </a> |
<a href="/principal">Regresar a pagina principal</a>
    <h1>Listado de juegos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>genero</th>
                <th>edad</th>
                <th>plataforma</th>
                <th>precio</th>
                <th>desarroladora</th>
                <th>año</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($juegos as $juego)
                <tr>
                    <td>{{ $juego->nombre_juego }}</td>
                    <td>{{ $juego->genero }}</td>
                    <td>{{ $juego->edad }}</td>
                    <td>{{ $juego->plataforma }}</td>
                    <td>{{ $juego->precio }}</td>
                    <td>{{ $juego->desarrolladora }}</td>
                    <td>{{ $juego->release_year }}</td>
                    <td>{{ $juego->created_at }}</td>
                    <td>
                    <a href="{{ route('juego.show', $juego) }}">Ver juegos </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>