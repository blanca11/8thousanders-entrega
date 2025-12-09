@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-xl font-semibold mb-6">Registrar nuevo Administrador</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.admin.register.store') }}" method="POST" class="w-full max-w-lg">
        @csrf

        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror"
                   required autofocus>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror"
                   required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Contraseña --}}
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
            <input type="password" name="password" id="password"
                   class="w-full border rounded px-3 py-2 @error('password') border-red-500 @enderror"
                   required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirmar contraseña --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">
                Confirmar contraseña
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700">
                Crear Administrador
            </button>
        </div>
    </form>
</div>
@endsection

