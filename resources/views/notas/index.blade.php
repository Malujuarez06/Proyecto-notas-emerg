@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Notas</h1>

    <!-- Barra de búsqueda -->
    <form action="{{ route('notas.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}" class="input input-bordered w-full max-w-xs" placeholder="Buscar...">
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <a href="{{ route('notas.create') }}" class="btn btn-success mb-4">Crear Nueva Nota</a>

    <!-- Lista de notas -->
    <div class="space-y-4">
        @foreach($notas as $nota)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $nota->titulo }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($nota->contenido, 100) }}</p>

                <!-- Imagen de la nota -->
                @if($nota->imagen)
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de la nota" class="w-32 h-32 object-cover mt-2">
                @endif

                <div class="mt-4">
                    <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">Eliminar</button>
                    </form>
                    <a href="{{ route('notas.pdf', $nota->id) }}" class="btn btn-info">Generar PDF</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $notas->links() }}
    </div>
@endsection