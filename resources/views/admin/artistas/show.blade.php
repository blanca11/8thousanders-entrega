@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <!-- Encabezado -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ $artista->nombre }}</h1>
    </div>

    <!-- Información del Artista -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">Información General</h2>
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Nombre</p>
                <p class="text-lg font-medium text-gray-900">{{ $artista->nombre }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Ciudad</p>
                <p class="text-lg font-medium text-gray-900">{{ $artista->ciudad }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">País</p>
                <p class="text-lg font-medium text-gray-900">{{ $artista->pais }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Género</p>
                <p class="text-lg font-medium text-gray-900">{{ $artista->genero->nombre_genero }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Subgénero</p>
                <p class="text-lg font-medium text-gray-900">{{ $artista->subgenero->nombre_subgenero }}</p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="bg-gray-50 px-6 py-4 border-t flex flex-wrap gap-3">
            <a href="{{ route('admin.artistas.edit', $artista) }}"
               class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition shadow">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Editar
            </a>
            <form action="{{ route('admin.artistas.destroy', $artista) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition shadow"
                        onclick="return confirm('¿Estás seguro de eliminar este artista?')">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Eliminar
                </button>
            </form>
            <a href="{{ route('admin.artistas.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition shadow">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al listado
            </a>
        </div>
    </div>

    <!-- Comentarios de Discos -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">Comentarios de Discos</h2>
        </div>
        <div class="p-6">
            @php
                $comentariosDiscos = collect();
                foreach($artista->discos as $disco) {
                    foreach($disco->comentarios as $comentario) {
                        $comentariosDiscos->push([
                            'disco' => $disco,
                            'comentario' => $comentario
                        ]);
                    }
                }
            @endphp

            @if($comentariosDiscos->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disco</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comentario</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puntuación</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($comentariosDiscos as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item['disco']->titulo }}</div>
                                        @if($item['disco']->ano)
                                            <div class="text-xs text-gray-500">{{ $item['disco']->ano }}</div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-700 max-w-md">
                                        {{ $item['comentario']->comentario }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item['comentario']->usuario->name }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold 
                                            @if($item['comentario']->puntuacion >= 8) bg-green-100 text-green-800
                                            @elseif($item['comentario']->puntuacion >= 6) bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ $item['comentario']->puntuacion }}/10
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="mt-2 text-gray-500">No hay comentarios de discos</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Comentarios de Directos -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">Comentarios de Directos</h2>
        </div>
        <div class="p-6">
            @php
                $comentariosDirectos = collect();
                foreach($artista->directos as $directo) {
                    foreach($directo->comentarios as $comentario) {
                        $comentariosDirectos->push([
                            'directo' => $directo,
                            'comentario' => $comentario
                        ]);
                    }
                }
            @endphp

            @if($comentariosDirectos->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lugar</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comentario</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puntuación</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($comentariosDirectos as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item['directo']->fecha->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $item['directo']->lugar->nombre }}</div>
                                        <div class="text-xs text-gray-500">{{ $item['directo']->lugar->ciudad }}</div>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-700 max-w-md">
                                        {{ $item['comentario']->comentario }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $item['comentario']->usuario->name }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold 
                                            @if($item['comentario']->puntuacion >= 8) bg-green-100 text-green-800
                                            @elseif($item['comentario']->puntuacion >= 6) bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ $item['comentario']->puntuacion }}/10
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                    </svg>
                    <p class="mt-2 text-gray-500">No hay comentarios de directos</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection