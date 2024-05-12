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
    <title>Editar</title>
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

        <!-- Contenido principal -->
        <div class="content">
            <h1>Editar comentario</h1>
           
            <hr>
            
            <form action="{{ route('plataforma.update', $plataforma) }}" method="POST">
                @csrf
                @method('PATCH')
                <label for="nombre_plataforma">Nombre de la Plataforma:</label>
                <input type="text" name="nombre_plataforma" value="{{ $plataforma->nombre_plataforma }}">
                @error('nombre_plataforma') 
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br><br>

                <label for="tipo_plataforma">Tipo de Plataforma:</label>
                <input type="text" name="tipo_plataforma" value="{{ $plataforma->tipo_plataforma }}">
                @error('tipo_plataforma') 
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror       
                <br><br>
              

                <input type="submit" value="Enviar">
            </form>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light text-center py-3">
            <p>&copy; GAMESTORE DC</p>
        </footer>
    

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
