<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Compra exitosa!</h1>
        <p>{{ $nombres[0] }}, tu compra se ha realizado con éxito. ¡Gracias por tu pedido!</p>
        <p>A continuación, encontrarás los detalles de tu compra:</p>
        <table>
            <thead>
                <tr>
                    <th>Nombre del juego</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($juegos); $i++)
                <tr>
                    <td>{{ $juegos[$i] }}</td>
                    <td>{{ $precios[$i] }}</td>
                    <td>{{ $ofertas[$i] }}</td>
                </tr>
            @endfor
            </tbody>
        </table>
        <br>
        <p>El cobro de ha realizado por $ {{$Total}} MXN</p>
        <br><br>
    </div>
</body>
</html>

