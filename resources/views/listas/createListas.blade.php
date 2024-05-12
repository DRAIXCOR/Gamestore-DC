<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Lista</title>

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
        width: 100%; /* Ancho total de la tabla */
        border-collapse: collapse; /* Colapsar los bordes de la tabla */
        margin-top: 20px; /* Espaciado superior */
    }

    th, td {
        padding: 12px; /* Espaciado interno de las celdas */
        text-align: left; /* Alineación del texto */
        border-bottom: 1px solid #ddd; /* Borde inferior */
    }

    th {
        background-color: #f2f2f2; /* Color de fondo de las celdas de encabezado */
        color: #333; /* Color del texto de las celdas de encabezado */
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
                            <a class="nav-link" href="/lista">Lista de deseos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
   
    <h1>Agregar juego a la lista de deseos</h1>

    <hr>
    @include('parciales.formError')
    <form action="/lista" method="POST">
        @csrf

        <input type="hidden" name="name" value="{{ auth()->user()->name }}" readonly >
        @error('Nombre del Usuario') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" readonly >
        @error('Id del Usuario') 
            <div class=”alert alert-danger”> {{$message}}</div>
        @enderror
        <!-- Campos ocultos para el juego seleccionado 
        <input type="hidden" id="juego_id" name="juego_id">-->
        <input type="hidden" id="nombre_juego" name="nombre_juego">
        <input type="hidden" id="precio" name="precio">
        <input type="hidden" id="oferta" name="oferta">
        <input type="hidden" id="disponible" name="disponible">

        <!-- JAVA SCRIPT PARA GENERAR UN DESCUENTO ALEATORIO-->
        <script>
            function actualizarDescuentos() {
            // Obtener todas las celdas de descuento
            var celdasDescuento = document.querySelectorAll('td.descuento input');

            // Iterar sobre cada celda de descuento
            celdasDescuento.forEach(function(celda) {
                // Generar un número aleatorio entre 1 y 100
                var probabilidad = Math.floor(Math.random() * 100) + 1;

                // Asignar el nuevo valor al input de descuento
                if (probabilidad <= 40) {
                    celda.value = '20%';
                } else if (probabilidad <= 50) {
                    celda.value = '50%';
                }

                // Bloquear el botón después de actualizar los descuentos
                document.getElementById('btnDescuento').disabled = true;
            });
        }
</script>

<script>
    function setJuegoData(row) {
        var juegoId = row.cells[7].querySelector('input[type="radio"]').value;
        var nombreJuego = row.cells[0].innerText;
        var precio = row.cells[2].innerText;
        var oferta = row.cells[5].querySelector('input[type="text"]').value;
        var disponible = row.cells[6].querySelector('select').value;

        //document.getElementById('juego_id').value = juegoId;
        document.getElementById('nombre_juego').value = nombreJuego;
        document.getElementById('precio').value = precio;
        document.getElementById('oferta').value = oferta;
        document.getElementById('disponible').value = disponible;
    }
</script>
        <button id="btnDescuento" onclick="actualizarDescuentos()">Generar Descuentos</button>
        <br>
        <input type="submit" value="Enviar">
        
        <div class="container">
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Plataforma</th>
                    <th>Precio</th>
                    <th>Desarrolladora</th>
                    <th>Portada</th>
                    <th class="descuento">Descuento</th>
                    <th>Disponible</th>
                    <th>Agregar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juegos as $juego)
                    <tr>
                        <td>{{ $juego->nombre_juego }}</td>
                        <td>{{ $juego->Plataforma->nombre_plataforma }}</td> 
                        <td>{{ $juego->precio }}</td>
                        <td>{{ $juego->desarrolladora }}</td>
                        <td>
                            <img src="{{ asset($juego->imagen) }}" alt="Portada del juego">
                        </td>
                        <td class="descuento">
                            <input type="text" name="descuento" placeholder="Descuento" style="width: 40px;" value="No" readonly>
                        </td>
                        <td>
                            <select name="disponible" id="disponible">
                                <option value="Si" {{ old('disponible') == 'Si' ? 'selected' : '' }}>Disponible</option>
                                <option value="No" {{ old('disponible') == 'No' ? 'selected' : '' }}>No disponible</option>
                            </select>
                            @error('Disponible') 
                                <div class=”alert alert-danger”> {{$message}}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="radio" name="seleccionar" value="{{ $juego->id }}" onclick="setJuegoData(this.parentNode.parentNode)" style="transform: scale(1.5);">
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </form>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
