<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Estilos de Bootstrap o personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Agregar otros estilos si es necesario -->
    @yield('styles')
</head>
<body>
    <div class="container">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <!-- Aquí puedes agregar más enlaces de navegación según lo necesites -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Crear Post</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container mt-4">
        <!-- Contenido principal -->
        @yield('content')
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Agregar otros scripts si es necesario -->
    @yield('scripts')
</body>
</html>