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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
    <title>Catalogo</title>
</head>
<body class="bg-custom">
<body>
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
                         <a class="nav-link" href="{{ route('plataforma.index')}}">Regresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    

    <div class="container">
        <h1>Catalogo de {{ $plataforma->nombre_plataforma }}</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Edad</th>
                    <th>Precio</th>
                    <th>Desarrolladora</th>
                    <th>Año</th>
                    <th>Fecha</th>
                    <th>Portada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juego as $juego)
                    <tr>
                        <td>{{ $juego->nombre_juego }}</td>
                        <td>{{ $juego->genero }}</td>
                        <td>{{ $juego->edad }}</td>
                        <td>{{ $juego->precio }}</td>
                        <td>{{ $juego->desarrolladora }}</td>
                        <td>{{ $juego->release_year }}</td>
                        <td>{{ $juego->created_at }}</td>
                        <td>
                            <img src="{{ asset($juego->imagen) }}" alt="Portada del juego">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<br><br><br>
    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
