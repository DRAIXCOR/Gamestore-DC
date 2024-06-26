<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Infor comentario</title>
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
                    
                </ul>
            </div>
        
    </nav>
    <h1>Informacion del juego: {{ $lista->nombre_juego }} </h1>
        <ul>
            <li>Usuario: {{ $lista->name }}</li>
            <li>Juego: {{ $lista->nombre_juego }}</li>
            <li>Precio: {{ $lista->precio}}</li>
            <li>Oferta: {{ $lista->oferta}}</li>
            <li>Disponible: {{ $lista->disponible}}</li>
           
    <li>
        <a href="{{ route('lista.edit', $lista) }}" class="btn btn-primary">Editar </a> |
        <a href="{{ route('lista.index', $lista) }}" class="btn btn-secondary">Volver </a>
        <form action="{{ route('lista.destroy', $lista) }}" method="POST">
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