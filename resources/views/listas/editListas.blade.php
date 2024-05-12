<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar lista</title>
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
                            <a class="nav-link" href="/lista">Lista de deseos</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
    </nav>

    <h1>Editar juego de la lista</h1>

    <hr>
    @include('parciales.formError')
    <form action="{{ route('lista.update', $lista) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nombre_juego">Nombre del Videojuego:</label>
        <input type="text" name="nombre_juego" value=" {{$lista->nombre_juego}} ">
        @error('Nombre del juego') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>
        

        <label for="precio">Precio en pesos (MXN):</label>
        <input type="number" name="precio" step="1" style="width: 55px;" value="{{$lista->precio}}">
        <br><br>
        @error('Precio en pesos') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        
        <label for="oferta">Oferta:</label>
        <select name="oferta" id="oferta">
            <option value="No" {{ old('oferta') == 'No' ? 'selected' : '' }}>No</option>
            <option value="20%" {{ old('oferta') == '20%' ? 'selected' : '' }}>20%</option>
            <option value="50%" {{ old('oferta') == '50%' ? 'selected' : '' }}>50%</option>
            <option value="90%" {{ old('oferta') == '99%' ? 'selected' : '' }}>90%</option>
        </select>
        @error('Oferta') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <label for="Disponible">Oferta:</label>
        <select name="disponible" id="disponible">
            <option value="Si" {{ old('disponible') == 'Si' ? 'selected' : '' }}>Disponible</option>
            <option value="No" {{ old('disponible') == 'No' ? 'selected' : '' }}>No disponible</option>
        </select>
        @error('Disponible') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
