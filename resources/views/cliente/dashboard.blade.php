@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Zona de Clientes</h1>
    <p class="mt-4">¡Hola, {{ Auth::user()->name }}! Estás en tu área de cliente.</p>
    {{-- Aquí puedes poner enlaces a las secciones de cliente --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button>Logout</button>
    </form>
</div>
@endsection