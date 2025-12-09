<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Directo;
use App\Models\Genero;
use App\Models\Subgenero;
use App\Models\LugarDirecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1) Listar todos los artistas paginados
        //$artistas = Artista::with(['genero', 'subgenero'])->paginate(10);
        //return view('admin.artistas.index', compact('artistas'));
        // 1) Carga de datos para los selects del form
        $generos = Genero::orderBy('nombre_genero')->get();
        $años     = Directo::selectRaw('YEAR(fecha) as year')
                           ->distinct()
                           ->orderBy('year','desc')
                           ->pluck('year');
        $festivales = LugarDirecto::where('es_festival', true)
                              ->orderBy('ciudad')
                              ->orderBy('nombre')
                              ->get();
        $salas      = LugarDirecto::where('es_festival', false)
                              ->orderBy('ciudad')
                              ->orderBy('nombre')
                              ->get();

        // 2) Construcción de la consulta principal
        $query = Artista::with([
            // cargamos discos+comentarios y directos+comentarios
            'discos.comentarios.usuario', 
            'directos.comentarios.usuario',
            'directos.lugar'
        ]);

        // Filtro Nombre
        if ($request->filled('nombre')) {
            $query->where('nombre','like','%'.$request->nombre.'%');
        }

        // Filtro Estilo
        if ($request->filled('id_genero')) {
            $query->where('id_genero',$request->id_genero);
        }

        // Si se pide festival/sala/año, filtramos los artistas que tengan directos que cumplan:
        if ($request->filled('lugar_festival') || $request->filled('lugar_sala') || $request->filled('year')) {
            $query->whereHas('directos', function($q) use($request){
                // festival
                if ($request->filled('lugar_festival')) {
                    $q->where('id_lugar', $request->lugar_festival);
                }
                // sala (no festival)
                if ($request->filled('lugar_sala')) {
                    $q->where('id_lugar', $request->lugar_sala);
                }
                // año
                if ($request->filled('year')) {
                    $q->whereYear('fecha',$request->year);
                }
            });
        }

        // 3) Obtener resultados paginados
        $artistas = $query->orderBy('nombre')->paginate(15)->appends($request->query());

        // 4) Pasar todo a la vista
        return view('admin.artistas.index', compact('artistas','generos','años','festivales','salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Enviamos sólo los géneros; los subgéneros vendrán por AJAX
        $generos = Genero::orderBy('nombre_genero')->get(['id_genero','nombre_genero']);
        // inicializamos subgeneros como colección vacía.
        $subgeneros = collect();
        $paises = config('paises', []);
        return view('admin.artistas.create', compact('generos', 'subgeneros', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 3) Validar y guardar nuevo artista
        $data = $request->validate([
            'nombre'       => 'required|string|max:100',
            'ciudad'       => 'nullable|string|max:50',
            'pais'         => 'nullable|string|max:50',
            'id_genero'    => 'required|exists:genero,id_genero',
            'id_subgenero' => 'required|exists:subgenero,id_subgenero',
        ]);

        Artista::create($data);

        return redirect()->route('admin.artistas.index')
                         ->with('success', 'Artista creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artista $artista)
    {
        // 4) Mostrar datos de un artista (y opcionalmente sus discos/directos)
        return view('admin.artistas.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artista $artista)
    {
        // 5) Mostrar formulario de edición
        //$generos    = Genero::all(); estaba así antes de añadir lo de paises
        //$subgeneros = Subgenero::all();

        $generos = Genero::orderBy('nombre_genero')->get(['id_genero','nombre_genero']);
        $subgeneros = Subgenero::where('id_genero', $artista->id_genero)
                           ->orderBy('nombre_subgenero')
                           ->get(['id_subgenero','nombre_subgenero']);
        $paises = config('paises', []);

        $artista->load([
            'discos.comentarios.usuario',
            'directos.comentarios.usuario',
            'directos.lugar',
        ]);

        return view('admin.artistas.edit', compact('artista', 'generos', 'subgeneros', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artista $artista)
    {
        // 6) Validar y actualizar
        $data = $request->validate([
            'nombre'       => 'required|string|max:100',
            'ciudad'       => 'nullable|string|max:50',
            'pais'         => 'nullable|string|max:50',
            'id_genero'    => 'required|exists:genero,id_genero',
            'id_subgenero' => 'required|exists:subgenero,id_subgenero',
        ]);

        $artista->update($data);

        return redirect()->route('admin.artistas.index')
                         ->with('success', 'Artista actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artista $artista)
    {
        DB::transaction(function () use ($artista) {
        // Si necesitas borrar en cascada manualmente:
        // Borrar comentarios de discos
        foreach ($artista->discos as $disco) {
            $disco->comentarios()->delete();
            $disco->delete();
        }

        // Borrar comentarios de directos
        foreach ($artista->directos as $directo) {
            $directo->comentarios()->delete();
            $directo->delete();
        }

        // Por último, borrar el artista
        $artista->delete();
    });

    return redirect()
        ->route('admin.artistas.index')
        ->with('status', 'Artista eliminado correctamente.');
    }
}
