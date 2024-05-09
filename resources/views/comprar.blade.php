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
    <title>Comprar</title>
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

        <h1>Comprar productos</h1>

        @php
            $Total = 0
        @endphp
        @php
            $con = 0
        @endphp

        <table border="1">
            <thead>
                <tr>
                <th>Juego</th>
                <th>Precio</th>
                <th>Oferta</th>
                <th>Precio total</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($listas as $lista)
                @if($lista->disponible === 'Si')
                <tr>
                    <td>{{ $lista->nombre_juego }}</td>
                    <td>{{ $lista->precio }}</td>
                    <td>{{ $lista->oferta }}</td>   
                    
                    @if($lista->oferta === '20%')
                        <td>{{ $lista->precio * .8 }}</td>
                        @php
                            $Total = $Total + $lista->precio * .8
                        @endphp
                    @elseif($lista->oferta === '50%')
                        <td>{{ $lista->precio * .5 }}</td>
                        @php
                            $Total = $Total + $lista->precio * .5
                        @endphp
                    @elseif($lista->oferta === '99%')
                        <td>{{ $lista->oferta * .1}}</td>
                        @php
                            $Total = $Total + $lista->precio * .1
                        @endphp
                    @else 
                        <td>{{ $lista->precio }}</td>
                        @php
                            $Total = $Total + $lista->precio
                        @endphp
                    @endif

                    @php
                        $con = $con + 1 
                    @endphp

                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        @if($con > 0)
            <br>
            <h4>Total a pagar ${{$Total}}</h4>
            <br>
            <a href='/comprar'  class="btn btn-primary">Realizar compra</a>
        @else 
            <br>
            <h4>No se puede realizar una compra sin productos</h4>
        @endif

    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; GAMESTORE DC</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
