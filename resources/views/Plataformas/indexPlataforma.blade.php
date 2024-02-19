<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
</head>
<body>
    <a href="plataforma/create">crear nuevo </a> |
    <a href="/principal">Regresar a pagina principal</a>
    <h1>Listado de Plataformas </h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>tipo</th>
                <th>fecha</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plataformas as $plataforma)
                <tr>
                    <td>{{ $plataforma->nombre_plataforma }}</td>
                    <td>{{ $plataforma->tipo_plataforma }}</td>
                    <td>{{ $plataforma->created_at }}</td>
                    <td>
                        <a href="{{ route('plataforma.show', $plataforma) }} ">Ver plataformas </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>