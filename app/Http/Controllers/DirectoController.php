<?php

namespace App\Http\Controllers;

use App\Models\Directo;
use App\Models\ComentarioDirecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectoController extends Controller
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
            'id_artista' => 'required|exists:artista,id_artista',
            'id_lugar'   => 'required|exists:lugar_directo,id_lugar',
            'fecha'      => 'required|date',        // datetime-local enviado como YYYY-MM-DDTHH:MM
            'comentario' => 'required|string|min:1',
            'puntuacion' => 'required|numeric|min:0|max:10',
        ]);

        // 2) Crear el registro en la tabla 'directo'
        $directo = Directo::create([
            'id_artista' => $data['id_artista'],
            'id_lugar'   => $data['id_lugar'],
            'fecha'      => $data['fecha'],  // Asumiendo que el campo en BD es datetime o timestamp
        ]);

        // 3) Crear el comentario en 'comentario_directo' ligándolo al usuario autenticado
        ComentarioDirecto::create([
            'id_directo' => $directo->id_directo,
            'id_usuario' => Auth::id(),
            'comentario' => $data['comentario'],
            'puntuacion' => $data['puntuacion'],
        ]);

        // 4) Redirigir de vuelta con mensaje de éxito
        return redirect()
               ->route('admin.registrar_general')
               ->with('success_directo', 'Directo y comentario guardados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Directo $directo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directo $directo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Directo $directo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directo $directo)
    {
        //
    }
}
