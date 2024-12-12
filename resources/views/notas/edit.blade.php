@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Editar Nota</h1>

    <form action="{{ route('notas.update', $nota->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="titulo" class="block font-medium">Título</label>
            <input type="text" name="titulo" id="titulo" class="input input-bordered w-full" value="{{ old('titulo', $nota->titulo) }}" required>
            @error('titulo')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="contenido" class="block font-medium">Contenido</label>
            <textarea name="contenido" id="contenido" class="textarea textarea-bordered w-full" rows="5" required>{{ old('contenido', $nota->contenido) }}</textarea>
            @error('contenido')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="imagen" class="block font-medium">Imagen (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="input input-bordered w-full">
            @error('imagen')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
            @if ($nota->imagen)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $nota->imagen) }}" alt="Imagen de la nota" class="w-32 h-32 object-cover">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Nota</button>
    </form>

    <a href="{{ route('notas.index') }}" class="btn btn-secondary mt-4">Volver a la lista</a>
@endsection