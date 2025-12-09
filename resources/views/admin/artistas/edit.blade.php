@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Editar Artista</h1>
            <p class="text-gray-600">Actualiza la información del artista y gestiona comentarios</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 mb-6 rounded-r-lg shadow-sm">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Formulario Principal -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-3 border-b">Información Básica</h2>
            
            <form action="{{ route('admin.artistas.update', $artista) }}" method="POST" x-data="artistaForm({{ $artista->id_genero }}, {{ $artista->id_subgenero }})" x-init="cargarSubgeneros()">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6" x-data="artistaForm()" x-init="cargarSubgeneros()">
                    <!-- Nombre -->
                    <div class="md:col-span-2">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Artista</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $artista->nombre) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('nombre') border-red-500 @enderror"
                               required>
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1.5 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Ciudad -->
                    <div>
                        <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $artista->ciudad) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('ciudad') border-red-500 @enderror">
                        @error('ciudad')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- País --}}
                    <div class="mb-4">
                        <label for="pais" class="block text-sm font-medium text-gray-700 mb-2">País</label>
                        <select name="pais"
                                id="pais"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('pais') border-red-500 @enderror"
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
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Género -->
                    <div>
                        <label for="id_genero" class="block text-sm font-medium text-gray-700 mb-2">Género Musical</label>
                        <select name="id_genero" id="id_genero" x-model="generoSeleccionado"
                                @change="cargarSubgeneros()"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('id_genero') border-red-500 @enderror"
                                required>
                            <option value="">-- Selecciona Género --</option>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id_genero }}"
                                    {{ old('id_genero', $artista->id_genero) == $genero->id_genero ? 'selected' : '' }}>
                                    {{ $genero->nombre_genero }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_genero')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subgénero -->
                    <div>
                        <label for="id_subgenero" class="block text-sm font-medium text-gray-700 mb-2">Subgénero</label>
                        <select name="id_subgenero" id="id_subgenero" x-model="subgeneroSeleccionado"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('id_subgenero') border-red-500 @enderror"
                                required>
                            <option value="">-- Selecciona Subgénero --</option>
                            <template x-for="sub in subgeneros" :key="sub.id_subgenero">
                                <option :value="sub.id_subgenero" x-text="sub.nombre_subgenero"></option>
                            </template>
                        </select>
                        @error('id_subgenero')
                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botón Submit -->
                <div class="mt-8 pt-6 border-t flex justify-end">
                    <button type="submit"
                            class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold px-8 py-3 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transform hover:scale-105 transition-all duration-200 shadow-md hover:shadow-lg">
                        💾 Actualizar Artista
                    </button>
                </div>
            </form>
        </div>

        <!-- COMENTARIOS DE DISCOS -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center mb-6 pb-3 border-b">
                <svg class="w-6 h-6 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Comentarios de Discos</h2>
            </div>

            @foreach($artista->discos as $disco)
                <div class="mb-6 last:mb-0 border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
                    <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center">
                        <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                        {{ $disco->titulo }}
                    </h3>

                    @forelse($disco->comentarios as $comentario)
                        <div class="mb-4 last:mb-0 bg-gray-50 rounded-lg p-4 border-l-4 border-yellow-400">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    <strong class="text-gray-800">{{ $comentario->usuario->name }}</strong>
                                </p>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    ⭐ {{ $comentario->puntuacion }}/10
                                </span>
                            </div>

                            @if((int)$comentario->id_usuario === (int)auth()->id())
                                <form action="{{ route('admin.disco.comentarios.update', $comentario) }}"
                                      method="POST"
                                      class="space-y-4">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tu Comentario</label>
                                        <textarea name="comentario" rows="3"
                                                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('comentario') border-red-500 @enderror">{{ old('comentario', $comentario->comentario) }}</textarea>
                                        @error('comentario')
                                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Puntuación (0–10)</label>
                                        <input type="number" name="puntuacion" step="0.1" min="0" max="10"
                                               value="{{ old('puntuacion', $comentario->puntuacion) }}"
                                               class="w-32 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('puntuacion') border-red-500 @enderror">
                                        @error('puntuacion')
                                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                            class="bg-blue-600 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        Guardar Cambios
                                    </button>
                                </form>
                            @else
                                <p class="text-gray-700 italic">"{{ $comentario->comentario }}"</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 italic text-center py-4">Este disco aún no tiene comentarios.</p>
                    @endforelse
                </div>
            @endforeach
        </div>

        @if(session('success_comentario_disco'))
            <div class="mb-8 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success_comentario_disco') }}
                </div>
            </div>
        @endif

        <!-- COMENTARIOS DE DIRECTOS -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center mb-6 pb-3 border-b">
                <svg class="w-6 h-6 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Comentarios de Conciertos en Vivo</h2>
            </div>

            @foreach($artista->directos as $directo)
                <div class="mb-6 last:mb-0 border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
                    <h3 class="font-bold text-lg text-gray-800 mb-1 flex items-center">
                        <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                        {{ $directo->lugar->ciudad }} – {{ $directo->lugar->nombre }}
                    </h3>
                    <p class="text-sm text-gray-600 mb-4 ml-4">
                        📅 {{ \Carbon\Carbon::parse($directo->fecha)->format('d/m/Y') }}
                    </p>

                    @forelse($directo->comentarios as $comentario)
                        <div class="mb-4 last:mb-0 bg-gray-50 rounded-lg p-4 border-l-4 border-yellow-400">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    <strong class="text-gray-800">{{ $comentario->usuario->name }}</strong>
                                </p>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    ⭐ {{ $comentario->puntuacion }}/10
                                </span>
                            </div>

                            @if((int)$comentario->id_usuario === (int)auth()->id())
                                <form action="{{ route('admin.directo.comentarios.update', $comentario) }}"
                                      method="POST"
                                      class="space-y-4">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tu Comentario</label>
                                        <textarea name="comentario" rows="3"
                                                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('comentario') border-red-500 @enderror">{{ old('comentario', $comentario->comentario) }}</textarea>
                                        @error('comentario')
                                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Puntuación (0–10)</label>
                                        <input type="number" name="puntuacion" step="0.1" min="0" max="10"
                                               value="{{ old('puntuacion', $comentario->puntuacion) }}"
                                               class="w-32 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('puntuacion') border-red-500 @enderror">
                                        @error('puntuacion')
                                            <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                            class="bg-blue-600 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        Guardar Cambios
                                    </button>
                                </form>
                            @else
                                <p class="text-gray-700 italic">"{{ $comentario->comentario }}"</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 italic text-center py-4">Este concierto aún no tiene comentarios.</p>
                    @endforelse
                </div>
            @endforeach
        </div>

    </div>
</div>


@endsection


