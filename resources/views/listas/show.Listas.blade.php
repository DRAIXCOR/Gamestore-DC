<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infor comentario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .container-fluid {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .content {
                flex: 1 0 auto;
            }
            footer {
                flex-shrink: 0;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
            .bg-custom {
                background-color: #CCCCCC; /* Color gris */
            }
    </style>

</head>
<body class="bg-custom">
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
    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>