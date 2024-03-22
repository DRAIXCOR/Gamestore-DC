<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado</title>
    
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

     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Cambiar la clase 'navbar-light' a 'navbar-dark' y 'bg-light' a 'bg-dark' -->
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/principal">GAMESTORE DC</a>


                <!-- Botón para dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/plataforma">ver listado</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
    </nav>
    
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

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>
    
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>