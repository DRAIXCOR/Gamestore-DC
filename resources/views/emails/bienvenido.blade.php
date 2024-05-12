<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
        }
        .button {
            display: inline-block;
            background-color: #002699;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Bienvenido a Gamestore DC</h1>
        <p>Hola {{ $nombreUsuario }}, ¡gracias por registrarte en nuestro nuestra tienda en línea!</p>
        <p>¡Esperamos que disfrutes de tu experiencia con nosotros, comprando a los mejores precios!</p>
        <a href="http://127.0.0.1:8000/principal" class="button">Comenzar</a>
    </div>
</body>
</html>
