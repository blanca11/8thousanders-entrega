@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Panel de Administración</h1>
    <p class="mt-4">¡Bienvenido, {{ Auth::user()->name }}!</p>
    <a href="{{ route('admin.admin.register') }}" class="mt-6 inline-block bg-blue-600 text-green font-semibold px-4 py-2 rounded hover:bg-blue-700">
        Registrar nuevo administrador
    </a>
</div>
@endsection
