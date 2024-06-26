<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMESTORE DC</title>
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

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>
</head>
<body class="bg-custom">
<body>

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
                        <a class="nav-link" href="{{ route('plataforma.index') }}">Plataforma</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('juego.index') }}">Juego</a>
                    </li>
                 
                    @if ($user)

                        <li class="nav-item">
                            <a class="nav-link" href="lista/create">Lista de deseos</a>
                        </li>

                        <div class="dropdown">
                            <button class="nav-link">{{ $user->name }}</button>
                            <div class="dropdown-content">
                                
                                <a class="nav-link" href="{{ route('profile.show') }}">Pefil</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link" :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();"> Log Out </a>
                                </form>
                            </div>
                        </div>

                    @else
                        <div class="dropdown">
                            <button class="nav-link">Invitado</button>
                                <div class="dropdown-content">
                        
                                    <a class="nav-link" href="login">Log In</a>
                                
                                    <a class="nav-link" href="register">Registrarse</a>
                                    
                                </div>
                        </div>
                    @endif              
                
                </ul>

            </div>
        </div>
    </nav>

    <!--<h2>Tablas para crear las plataformas de videojuegos y otra para los juegos</h2>-->
    

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('imagenes/1.png') }}" alt="1" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes añadir texto o contenido adicional para la primera imagen -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('imagenes/2.png') }}" alt="1"  class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <!-- Aquí puedes añadir texto o contenido adicional para la segunda imagen -->
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
