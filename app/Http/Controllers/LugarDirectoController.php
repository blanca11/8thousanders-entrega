<?php

namespace App\Http\Controllers;

use App\Models\LugarDirecto;
use Illuminate\Http\Request;

class LugarDirectoController extends Controller
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
        
        // 1) Validar la request
        $data = $request->validate([
            'ciudad'       => 'required|string|max:50',
            'nombre'       => 'required|string|max:100',
            'es_festival'  => 'nullable|boolean',
        ]);

        // Forzar que es_festival sea booleano (0 o 1)
        $data['es_festival'] = $request->has('es_festival') ? true : false;

        // 2) Crear el registro
        $lugar = LugarDirecto::create($data);

        // 3) Redirigir de vuelta con mensaje de éxito
        return redirect()
               ->route('admin.registrar_general') 
               ->with('success_lugar', 'Lugar guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LugarDirecto $lugarDirecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LugarDirecto $lugarDirecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LugarDirecto $lugarDirecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LugarDirecto $lugarDirecto)
    {
        //
    }
}
