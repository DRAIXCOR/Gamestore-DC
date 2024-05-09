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
    <title>Lista de deseos</title>
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
                        <a class="nav-link" href="lista/create">Agregar juego a lista</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    

    <div class="container"> 

        <h1>Mi lista de deseos</h1>

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
                    <td>{{ $lista->precio }}</td>
                    <td>{{ $lista->oferta }}</td>
                    <td>{{ $lista->disponible }}</td>
                    <td>
                         <a href="{{ route('lista.show', $lista) }}" class="btn btn-primary">Detalles</a>
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
