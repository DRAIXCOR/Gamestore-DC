<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    
    <title>Listado</title>
</head>
<body class="bg-custom">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="plataforma/create">Crear Nuevo</a>
                    </li>      
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="content">
        <h1>Listado de Plataformas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plataformas as $plataforma)
                    <tr>
                        <td>{{ $plataforma->nombre_plataforma }}</td>
                        <td>{{ $plataforma->tipo_plataforma }}</td>
                        <td>{{ $plataforma->created_at }}</td>
                        <td>
                            <a href="{{ route('plataforma.show', $plataforma) }}" class="btn btn-primary">Ver Plataformas</a>
                            <a class="btn btn-primary" href="{{ route('plataforma.catalogo', $plataforma) }}">Ver catalogo de juegos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

