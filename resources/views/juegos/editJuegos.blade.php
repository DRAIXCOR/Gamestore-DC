<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .bg-custom {
            background-color: #CCCCCC; /* Color gris */
        }
    </style>
</head>
<body class="bg-custom">
    <title>Editar Juego</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/principal">GAMESTORE DC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </div>
</nav>
<h1>Editar Juego</h1>
<hr>
@include('parciales.formError')
<form action="/juego/{{ $juego->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="nombre_juego">Nombre del Videojuego:</label>
    <input type="text" name="nombre_juego" value="{{ $juego->nombre_juego }}">
    <br><br>

    <label for="genero">Género:</label>
<select name="genero" id="genero">
    <option value="accion" {{ old('genero') == 'accion' ? 'selected' : '' }}>Acción</option>
    <option value="aventura" {{ old('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
    <option value="rpg" {{ old('genero') == 'rpg' ? 'selected' : '' }}>Rol/RPG</option>
    <option value="deportes" {{ old('genero') == 'deportes' ? 'selected' : '' }}>Deportes</option>
    <option value="carreras" {{ old('genero') == 'carreras' ? 'selected' : '' }}>Carrera</option>
    <option value="lucha" {{ old('genero') == 'lucha' ? 'selected' : '' }}>Lucha</option>
    <option value="disparos" {{ old('genero') == 'disparos' ? 'selected' : '' }}>Disparos</option>
    <option value="terror" {{ old('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
    <option value="simulacion" {{ old('genero') == 'simulacion' ? 'selected' : '' }}>Simulación</option>
</select>
<br><br>

    <label for="edad">Edad Recomendada:</label>
    <input type="number" name="edad" step="1" style="width: 40px;" value="{{ $juego->edad }}">
    <br><br>
    
    <label>Plataformas:</label><br>
    @foreach($plataformas as $plataforma)
    <input type="radio" id="{{ $plataforma->nombre_plataforma }}" name="plataforma" value="{{ $plataforma->id }}" {{ old('plataforma') == $plataforma->id ? 'checked' : '' }}>
    <label for="{{ $plataforma->nombre_plataforma }}">{{ $plataforma->nombre_plataforma }}</label><br>
    @endforeach
    <br>

    <label for="precio">Precio en pesos (MXN):</label>
    <input type="number" name="precio" step="10" style="width: 65px;" value="{{ $juego->precio }}">
    <br><br>

    <label for="desarrolladora">Desarrolladora del Videojuego:</label>
    <input type="text" name="desarrolladora" value="{{ $juego->desarrolladora }}">
    <br><br>

    <label for="release_year">Año de lanzamiento:</label>
    <input type="number" name="release_year" step="1" style="width: 65px;" value="{{ $juego->release_year }}">
    <br><br>

    <label for="imagen">Portada:</label>
    <input type="file" name="imagen" accept="image/*" id="imagenInput">
     @error('file')
        <br>
        <small class="text-danger">{{ $message }}</small>
     @enderror
    <br><br>

    <!-- Vista previa de la imagen redimensionada -->
    <img id="imagenPreview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 200px; max-height: 200px;">
    <script>
        const imagenInput = document.getElementById('imagenInput');
        const imagenPreview = document.getElementById('imagenPreview');

        imagenInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                    // Redimensionar la imagen a un tamaño específico (por ejemplo, 200x200 píxeles)
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = 300;
                    canvas.height = 300;
                    ctx.drawImage(img, 0, 0, 300, 300);

                    // Mostrar la vista previa de la imagen redimensionada
                    imagenPreview.src = canvas.toDataURL();
                    imagenPreview.style.display = 'block';
                };
            };
            reader.readAsDataURL(file);
        });
    </script>
    <br><br>


    <!-- Campo oculto para almacenar el ID de la plataforma -->
    <input type="hidden" name="plataforma_id" id="plataforma_id" value="">
    <input type="submit" value="Guardar Cambios">
</form>
<footer class="bg-dark text-light text-center py-3">
    <p>&copy; GAMESTORE DC</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const checkboxes = document.querySelectorAll('input[name="plataforma[]"]');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const checkedCheckboxes = document.querySelectorAll('input[name="plataforma[]"]:checked');
            const checkedValues = Array.from(checkedCheckboxes).map(checkbox => checkbox.value);
            document.getElementById('plataforma_id').value = checkedValues.join(',');
        });
    });
</script>
</body>
</html>
