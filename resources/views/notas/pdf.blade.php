<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $nota->titulo }}</title>
</head>
<body>
    <h1>{{ $nota->titulo }}</h1>
    <p>{{ $nota->contenido }}</p>

    @if($nota->imagen)
        <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de la nota" style="max-width: 100%; height: auto;">
    @endif
</body>
</html>