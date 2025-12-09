@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8"
     x-data="artistaForm()"
     x-init="cargarSubgeneros()"
>
    <h1 class="text-2xl font-bold mb-6">Nuevo Artista</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.artistas.store') }}" method="POST" class="w-full max-w-lg">
        @csrf

        {{-- Nombre --}}
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text"
                   name="nombre"
                   id="nombre"
                   value="{{ old('nombre') }}"
                   class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                   required
            >
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Ciudad --}}
        <div class="mb-4">
            <label for="ciudad" class="block text-gray-700 font-medium mb-2">Ciudad</label>
            <input type="text"
                   name="ciudad"
                   id="ciudad"
                   value="{{ old('ciudad') }}"
                   class="w-full border rounded px-3 py-2 @error('ciudad') border-red-500 @enderror"
            >
            @error('ciudad')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- País --}}
        <div class="mb-4">
            <label for="pais" class="block text-gray-700 font-medium mb-2">País</label>
            <input type="text"
                   name="pais"
                   id="pais"
                   value="{{ old('pais') }}"
                   class="w-full border rounded px-3 py-2 @error('pais') border-red-500 @enderror"
            >
            @error('pais')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Género --}}
        <div class="mb-4">
            <label for="id_genero" class="block text-gray-700 font-medium mb-2">Género</label>
            <select name="id_genero"
                    id="id_genero"
                    x-model="generoSeleccionado"
                    @change="cargarSubgeneros()"
                    class="w-full border rounded px-3 py-2 @error('id_genero') border-red-500 @enderror"
                    required
            >
                <option value="">-- Selecciona género --</option>
            
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id_genero }}"
                        {{ old('id_genero') == $genero->id_genero ? 'selected' : '' }}>
                        {{ $genero->nombre_genero }}
                    </option>
                @endforeach
            </select>
            @error('id_genero')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Subgénero (se llena dinámicamente) --}}
        <div class="mb-6">
            <label for="id_subgenero" class="block text-gray-700 font-medium mb-2">Subgénero</label>
            <select name="id_subgenero"
                    id="id_subgenero"
                    x-model="subgeneroSeleccionado"
                    class="w-full border rounded px-3 py-2 @error('id_subgenero') border-red-500 @enderror"
                    required
            >
                <option value="">-- Selecciona subgénero --</option>
                <template x-for="sub in subgeneros" :key="sub.id_subgenero">
                    <option :value="sub.id_subgenero" x-text="sub.nombre_subgenero"
                        :selected="sub.id_subgenero == {{ old('id_subgenero', 'null') }}"
                    ></option>
                </template>
            </select>
            @error('id_subgenero')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón de envío --}}
        <button type="submit"
                class="bg-green-600 text-white font-semibold px-4 py-2 rounded hover:bg-green-700">
            Crear Artista
        </button>
    </form>
</div>

{{-- Alpine.js para manejar la recarga de subgéneros --}}
<script>
    function artistaForm() {
        return {
            // Inicializamos con el valor “viejo” para validaciones: si hay old('id_genero'),
            // Alpine lo lee y dispara cargarSubgeneros() en x-init.
            generoSeleccionado: "{{ old('id_genero') }}",
            subgeneroSeleccionado: "{{ old('id_subgenero') }}",
            subgeneros: [],

            cargarSubgeneros() {
                // Si no hay género seleccionado, limpiamos el array y salimos
                if (! this.generoSeleccionado) {
                    this.subgeneros = [];
                    return;
                }

                // Construimos la URL usando route('admin.artistas.subgeneros', 'ID')
                let urlBase = "{{ route('admin.artistas.subgeneros', ['id_genero' => 'XXX']) }}";
                // route() generará algo como '/admin/artistas/subgeneros/XXX'
                // Ahora reemplazamos 'XXX' por el ID real:
                let url = urlBase.replace('XXX', this.generoSeleccionado);
                console.log('→ Petición AJAX a:', url, '; id_genero =', this.generoSeleccionado);
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.subgeneros = data;
                    })
                    .catch(error => {
                        console.error('Error al cargar subgéneros:', error);
                        this.subgeneros = [];
                    });
            }
        }
    }
</script>
@endsection


