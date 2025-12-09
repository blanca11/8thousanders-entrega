@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Listado de Artistas</h1>

    {{-- ← Aquí añadimos el enlace a “Nuevos registros” --}}
    <a href="{{ route('admin.registrar_general') }}"
       class="inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700 mb-4">
        Nuevos registros
    </a>

    {{-- ← Aquí añadimos el enlace a “Insertar con .csv” --}}
    <a href="{{ route('admin.directos.import') }}"
       class="inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700 mb-4">
        Insertar Directos de festivales
    </a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif



  {{-- <div class="mt-4">
        {{ $artistas->links() }} {{-- Paginación --}} 
    {{--</div> --}}

    {{-- Formulario de filtros --}}
  <form action="{{ route('admin.artistas.index') }}" method="GET"
        class="bg-white p-6 rounded shadow space-y-4">
    <h2 class="text-xl font-semibold">Filtros de búsqueda</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      {{-- Nombre --}}
      <div>
        <label class="block font-medium">Nombre</label>
        <input type="text" name="nombre" value="{{ request('nombre') }}"
               class="w-full border rounded px-2 py-1">
      </div>

      {{-- Estilo --}}
      <div>
        <label class="block font-medium">Estilo</label>
        <select name="id_genero" class="w-full border rounded px-2 py-1">
          <option value="">-- todos --</option>
          @foreach($generos as $g)
            <option value="{{ $g->id_genero }}"
              {{ request('id_genero') == $g->id_genero ? 'selected' : '' }}>
              {{ $g->nombre_genero }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Festival (select) --}}
      <div>
        <label class="block font-medium">Festival</label>
        <select name="lugar_festival" class="w-full border rounded px-2 py-1">
          <option value="">-- todos --</option>
          @foreach($festivales as $f)
            <option value="{{ $f->id_lugar }}"
              {{ request('lugar_festival') == $f->id_lugar ? 'selected' : '' }}>
              {{ $f->ciudad }} – {{ $f->nombre }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Sala (select) --}}
      <div>
        <label class="block font-medium">Sala</label>
        <select name="lugar_sala" class="w-full border rounded px-2 py-1">
          <option value="">-- todos --</option>
          @foreach($salas as $s)
            <option value="{{ $s->id_lugar }}"
              {{ request('lugar_sala') == $s->id_lugar ? 'selected' : '' }}>
              {{ $s->ciudad }} – {{ $s->nombre }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Año de Directo --}}
      <div>
        <label class="block font-medium">Año de Directo</label>
        <select name="year" class="w-full border rounded px-2 py-1">
          <option value="">-- todos --</option>
          @foreach($años as $year)
            <option value="{{ $year }}"
              {{ request('year') == $year ? 'selected' : '' }}>
              {{ $year }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="pt-2">
      <button type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded">
        Filtrar
      </button>
      <a href="{{ route('admin.artistas.index') }}"
         class="ml-4 text-gray-600 hover:underline">
        Limpiar
      </a>
    </div>
  </form>

  {{ $artistas->links() }}

  {{-- tabla nueva y final para mostrar los filtrados --}}
  <div class="bg-white rounded shadow overflow-hidden">
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Artista
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Discos Comentados
          </th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Directos Comentados
          </th>
          <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
            Acciones
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($artistas as $artista)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm font-medium text-gray-900">
                {{ $artista->nombre }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                {{ $artista->discos->sum(fn($disco) => $disco->comentarios->count()) }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                {{ $artista->directos->sum(fn($directo) => $directo->comentarios->count()) }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="{{ route('admin.artistas.show', $artista) }}" 
                 class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded transition">
                Ver
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
              No se encontraron artistas que coincidan.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  </div>
</div>




@endsection

