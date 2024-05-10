<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Infor comentario</title>
    <style>
        
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
                    
                </ul>
            </div>
        
    </nav>
    <h1>juego ID {{ $juego->id }} </h1>
        <ul>
            <li>nombre: {{ $juego->nombre_juego }}</li>
            <li>genero: {{ $juego->genero}}</li>
            <li>edad: {{ $juego->edad}}</li>
            <li>plataforma: {{ $juego->Plataforma->nombre_plataforma}}</li>
            <li>precio: {{ $juego->precio}}</li>
            <li>desarrolladora: {{ $juego->desarrolladora}}</li>
            <li>año: {{ $juego->release_year}}</li>
            <li>portada: <img src="{{ asset($juego->imagen) }}" alt="Portada de {{ $juego->nombre_juego }}"></li>
           
    <li>
        <a href="{{ route('juego.edit', $juego) }}" class="btn btn-primary">Editar </a> |
        <a href="{{ route('juego.index', $juego) }}" class="btn btn-secondary">Volver </a>
        <form action="{{ route('juego.destroy', $juego) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
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
