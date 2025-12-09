<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use App\Models\ComentarioDisco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscoController extends Controller
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
    public function store(Request $request)
    {
        // 1) Validar la petición
        $data = $request->validate([
            'id_artista'   => 'required|exists:artista,id_artista',
            'titulo'       => 'required|string|max:150',
            'comentario'   => 'required|string|min:1',
            'puntuacion'   => 'required|numeric|min:0|max:10',
        ]);

        // 2) Crear el disco
        $disco = Disco::create([
            'id_artista' => $data['id_artista'],
            'titulo'     => $data['titulo'],
        ]);

        // 3) Crear el comentario asociándolo al usuario autenticado
        ComentarioDisco::create([
            'id_disco'   => $disco->id_disco,
            'id_usuario' => Auth::id(),
            'comentario' => $data['comentario'],
            'puntuacion' => $data['puntuacion'],
        ]);

        // 4) Redirigir de vuelta con mensaje de éxito
        return redirect()
               ->route('admin.registrar_general') // o la ruta donde esté el formulario
               ->with('success_disco', 'Disco y comentario guardados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disco $disco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disco $disco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disco $disco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disco $disco)
    {
        //
    }
}
