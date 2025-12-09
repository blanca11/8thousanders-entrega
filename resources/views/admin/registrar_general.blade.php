@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 space-y-8" x-data="artistaForm()" x-init="cargarSubgeneros()">
    {{-- 1) Card: Añadir Artista --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Añadir Artista</h2>
        <form action="{{ route('admin.artistas.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="nombre_artista" class="block text-gray-700 font-medium mb-1">Nombre</label>
                <input type="text"
                       name="nombre"
                       id="nombre_artista"
                       value="{{ old('nombre') }}"
                       class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                       required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ciudad --}}
            <div>
                <label for="ciudad_artista" class="block text-gray-700 font-medium mb-1">Ciudad</label>
                <input type="text"
                       name="ciudad"
                       id="ciudad_artista"
                       value="{{ old('ciudad') }}"
                       class="w-full border rounded px-3 py-2 @error('ciudad') border-red-500 @enderror">
                @error('ciudad')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- País --}}
            <div class="mb-4">
                <label for="pais" class="block text-gray-700 font-medium mb-2">País</label>
                <select name="pais"
                        id="pais"
                        class="w-full border rounded px-3 py-2 @error('pais') border-red-500 @enderror"
                        required>
                    <option value="">-- Selecciona país --</option>
                    @foreach($paises as $pais)
                        <option value="{{ $pais }}"
                            {{ old('pais') == $pais ? 'selected' : '' }}>
                            {{ $pais }}
                        </option>
                    @endforeach
                </select>
                @error('pais')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Género --}}
            <div>
                <label for="genero_artista" class="block text-gray-700 font-medium mb-1">Género</label>
                <select name="id_genero"
                        id="genero_artista"
                        x-model="generoSeleccionado"
                        @change="cargarSubgeneros()"
                        class="w-full border rounded px-3 py-2 @error('id_genero') border-red-500 @enderror"
                        required>
                    <option value="">-- Selecciona Género --</option>
                    @foreach($generos as $g)
                        <option value="{{ $g->id_genero }}"
                            {{ old('id_genero') == $g->id_genero ? 'selected' : '' }}>
                            {{ $g->nombre_genero }}
                        </option>
                    @endforeach
                </select>
                @error('id_genero')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subgénero --}}
            <div>
                <label for="subgenero_artista" class="block text-gray-700 font-medium mb-1">Subgénero</label>
                <select name="id_subgenero"
                        id="subgenero_artista"
                        x-model="subgeneroSeleccionado"
                        class="w-full border rounded px-3 py-2 @error('id_subgenero') border-red-500 @enderror"
                        required>
                    <option value="">-- Selecciona Subgénero --</option>
                    <template x-for="sub in subgeneros" :key="sub.id_subgenero">
                        <option :value="sub.id_subgenero" x-text="sub.nombre_subgenero"></option>
                    </template>
                </select>
                @error('id_subgenero')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-green-600 text-white font-semibold px-4 py-2 rounded hover:bg-green-700">
                Guardar Artista
            </button>
        </form>
    </div>

    {{-- 2) Card: Añadir Lugar --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Añadir Lugar de Directo</h2>

        {{-- Mostrar mensaje de éxito si existe --}}
        @if (session('success_lugar'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded">
                {{ session('success_lugar') }}
            </div>
        @endif

        <form action="{{ route('admin.lugar_directo.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Ciudad --}}
            <div>
                <label for="ciudad_lugar" class="block text-gray-700 font-medium mb-1">Ciudad</label>
                <input type="text"
                       name="ciudad"
                       id="ciudad_lugar"
                       value="{{ old('ciudad') }}"
                       class="w-full border rounded px-3 py-2 @error('ciudad') border-red-500 @enderror"
                       required>
                @error('ciudad')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nombre de sala o festival --}}
            <div>
                <label for="nombre_lugar" class="block text-gray-700 font-medium mb-1">Sala / Festival</label>
                <input type="text"
                       name="nombre"
                       id="nombre_lugar"
                       value="{{ old('nombre') }}"
                       class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                       required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Es festival --}}
            <div class="flex items-center space-x-2">
                <input type="checkbox"
                       name="es_festival"
                       id="es_festival"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                       {{ old('es_festival') ? 'checked' : '' }}>
                <label for="es_festival" class="text-gray-700 font-medium">¿Es festival?</label>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700">
                Guardar Lugar
            </button>
        </form>
    </div>

    {{-- Card: Añadir Disco y Mi Comentario --}}
<div class="bg-white shadow-md rounded-lg p-6">
  <h2 class="text-xl font-semibold mb-4">Añadir Disco y Mi Comentario</h2>

  @if(session('success_disco'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded">
      {{ session('success_disco') }}
    </div>
  @endif

  <form action="{{ route('admin.disco.store') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Artista --}}
    <div>
      <label for="artista_disco">Artista</label>
      <select name="id_artista" id="artista_disco" required>
        <option value="">-- Selecciona Artista --</option>
        @foreach($artistas as $a)
          <option value="{{ $a->id_artista }}"
                  {{ old('id_artista') == $a->id_artista ? 'selected' : '' }}>
            {{ $a->nombre }}
          </option>
        @endforeach
      </select>
      @error('id_artista')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

    {{-- Título del Disco --}}
    <div>
      <label for="titulo_disco">Título del Disco</label>
      <input type="text" name="titulo" id="titulo_disco"
             value="{{ old('titulo') }}" required>
      @error('titulo')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

    {{-- Mi Comentario --}}
    <div>
      <label for="comentario_disco">Mi Comentario</label>
      <textarea name="comentario" id="comentario_disco" rows="3" required>{{ old('comentario') }}</textarea>
      @error('comentario')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

    {{-- Mi Puntuación --}}
    <div>
      <label for="puntuacion_disco">Mi Puntuación (0–10)</label>
      <input type="number" name="puntuacion" id="puntuacion_disco"
             step="0.1" min="0" max="10"
             value="{{ old('puntuacion') }}" required>
      @error('puntuacion')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded">
      Guardar Disco
    </button>
  </form>
</div>


    {{-- 4) Card: Añadir Directo + Comentarios --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Añadir Directo y Comentarios</h2>
        <form action="{{ route('admin.directo.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Artista --}}
            <div>
                <label for="artista_directo" class="block text-gray-700 font-medium mb-1">Artista</label>
                <select name="id_artista"
                        id="artista_directo"
                        class="w-full border rounded px-3 py-2 @error('id_artista') border-red-500 @enderror"
                        required>
                    <option value="">-- Selecciona Artista --</option>
                    @foreach($artistas as $a)
                        <option value="{{ $a->id_artista }}"
                            {{ old('id_artista') == $a->id_artista ? 'selected' : '' }}>
                            {{ $a->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_artista')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Lugar --}}
            <div>
                <label for="lugar_directo" class="block text-gray-700 font-medium mb-1">Lugar (Ciudad / Sala)</label>
                <select name="id_lugar"
                        id="lugar_directo"
                        class="w-full border rounded px-3 py-2 @error('id_lugar') border-red-500 @enderror"
                        required>
                    <option value="">-- Selecciona Lugar --</option>
                    @foreach($lugares as $l)
                        <option value="{{ $l->id_lugar }}"
                            {{ old('id_lugar') == $l->id_lugar ? 'selected' : '' }}>
                            {{ $l->ciudad }} – {{ $l->nombre }} {{ $l->es_festival ? '(Festival)' : '' }}
                        </option>
                    @endforeach
                </select>
                @error('id_lugar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fecha del directo --}}
            <div>
                <label for="fecha_directo" class="block text-gray-700 font-medium mb-1">Fecha y Hora</label>
                <input type="datetime-local"
                       name="fecha"
                       id="fecha_directo"
                       value="{{ old('fecha') }}"
                       class="w-full border rounded px-3 py-2 @error('fecha') border-red-500 @enderror"
                       required>
                @error('fecha')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mi Comentario --}}
    <div>
      <label for="comentario_disco">Mi Comentario</label>
      <textarea name="comentario" id="comentario_disco" rows="3" required>{{ old('comentario') }}</textarea>
      @error('comentario')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

    {{-- Mi Puntuación --}}
    <div>
      <label for="puntuacion_disco">Mi Puntuación (0–10)</label>
      <input type="number" name="puntuacion" id="puntuacion_disco"
             step="0.1" min="0" max="10"
             value="{{ old('puntuacion') }}" required>
      @error('puntuacion')<p class="text-red-500">{{ $message }}</p>@enderror
    </div>

            <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700">
                Guardar Directo
            </button>
        </form>
    </div>
</div>
@endsection
