<?php

namespace App\Http\Controllers;

use App\Models\ComentarioDirecto;
use App\Models\Directo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioDirectoController extends Controller
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
    public function store(Request $request, Directo $directo)
    {
        // Validar que queden huecos (máx 3 comentarios)
        if ($directo->comentarios()->count() >= 3) {
            return back()->withErrors(['Ya hay 3 comentarios.']);
        }

        // Prevent same user twice
        if ($directo->comentarios()->where('id_usuario', Auth::id())->exists()) {
            return back()->withErrors(['Ya has comentado este directo.']);
        }

        $data = $request->validate([
            'comentario' => 'required|string',
            'puntuacion' => 'required|numeric|min:0|max:10',
        ]);

        ComentarioDirecto::create([
            'id_directo'   => $directo->id_directo,
            'id_usuario' => Auth::id(),
            'comentario' => $data['comentario'],
            'puntuacion' => $data['puntuacion'],
        ]);

        return back()->with('success','Comentario añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ComentarioDirecto $comentarioDirecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComentarioDirecto $comentarioDirecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $comentarioDirecto)
    {
        // Cargamos el comentario por ID (o 404 si no existe)
        $comentarioDirecto = ComentarioDirecto::findOrFail($comentarioDirecto);

        $authId = Auth::id();

        if ((int) $comentarioDirecto->id_usuario !== (int) $authId) {
            abort(403, 'No puedes editar comentarios de otros usuarios.');
        }

        $data = $request->validate([
            'comentario' => 'required|string|max:1000',
            'puntuacion' => 'required|numeric|min:0|max:10'
        ]);

        $comentarioDirecto->update($data);

        return back()->with('success_comentario_directo', 'Comentario de directo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComentarioDirecto $comentarioDirecto)
    {
        //
    }
}
