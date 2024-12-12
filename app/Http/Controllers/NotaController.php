<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF; //Importa la libreria de PDF 

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $notas = Nota::where('titulo', 'like', "%$search%")
            ->orWhere('contenido', 'like', "%$search%")
            ->paginate(10);
        return view('notas.index', compact('notas', 'search'));
    }

    public function create()
    {
        return view('notas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $imagen = $request->file('imagen') ? $request->file('imagen')->store('imagenes', 'public') : null;

        Nota::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $imagen,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota creada con éxito');
    }

    public function edit(Nota $nota)
    {
        return view('notas.edit', compact('nota'));
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($nota->imagen) {
                Storage::disk('public')->delete($nota->imagen);
            }
            $nota->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $nota->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $nota->imagen,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota actualizada con éxito');
    }

    public function destroy(Nota $nota)
    {
        if ($nota->imagen) {
            Storage::disk('public')->delete($nota->imagen);
        }
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota eliminada con éxito');
}

    public function generarPDF($id)
    {
        // Obtener la nota por su ID 
        $nota = Nota::findOrFail($id);

        //Generar el PDF con la vista 
        $pdf = PDF::loadView('notas.pdf', compact ('nota'));
        
        //Descargar el archivo PDF
        return $pdf->download('nota_' .$nota->id . '.pdf');

}
}