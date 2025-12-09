<?php

namespace App\Http\Controllers;

use App\Models\Subgenero;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubgeneroController extends Controller
{
    /**
     * Devuelve un JSON con todos los subgéneros cuyo id_genero = $id_genero
     */
    public function byGenero(int $id_genero): JsonResponse
    {
        $subgeneros = Subgenero::where('id_genero', $id_genero)
                                ->select('id_subgenero', 'nombre_subgenero')
                                ->orderBy('nombre_subgenero')
                                ->get();

        return response()->json($subgeneros);
    }
}
