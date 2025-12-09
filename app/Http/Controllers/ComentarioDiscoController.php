<?php

namespace App\Http\Controllers;

use App\Models\ComentarioDisco;
use App\Models\Disco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioDiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Disco $disco)
    {
        // Validar que queden huecos (máx 3 comentarios)
        if ($disco->comentarios()->count() >= 3) {
            return back()->withErrors(['Ya hay 3 comentarios.']);
        }

        // Prevent same user twice
        if ($disco->comentarios()->where('id_usuario', Auth::id())->exists()) {
            return back()->withErrors(['Ya has comentado este disco.']);
        }

        $data = $request->validate([
            'comentario' => 'required|string',
            'puntuacion' => 'required|numeric|min:0|max:10',
        ]);

        ComentarioDisco::create([
            'id_disco'   => $disco->id_disco,
            'id_usuario' => Auth::id(),
            'comentario' => $data['comentario'],
            'puntuacion' => $data['puntuacion'],
        ]);

        return back()->with('success','Comentario añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ComentarioDisco $comentarioDisco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComentarioDisco $comentarioDisco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $comentario)
    {
        // Cargamos el comentario por ID (o 404 si no existe)
        $comentario = ComentarioDisco::findOrFail($comentario);

        $authId = Auth::id();

        // Verificar que el usuario es el dueño del comentario
        if ((int) $comentario->id_usuario !== (int) $authId) {
            abort(403, 'No puedes editar comentarios de otros usuarios.');
        }

        $data = $request->validate([
            'comentario' => 'required|string|max:1000',
            'puntuacion' => 'required|numeric|min:0|max:10'
        ]);

        $comentario->update($data);

        return back()->with('success_comentario_disco', 'Comentario de disco actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComentarioDisco $comentarioDisco)
    {
        //
    }
}
