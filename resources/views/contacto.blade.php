@extends('layouts.appSite')
@section('title', 'Contacto')
@section('content')

<main class="contact">
    <!-- Cabecera -->
    <section class="contact-hero">
      <h1 class="contact-hero__title">Contacto</h1>
      <p class="contact-hero__subtitle">
        ¿Tienes dudas, propuestas o quieres que te ayudemos a preparar tu festival?
      </p>

      <p class="contact-hero__email">
        Escríbenos directamente a
        <a href="mailto:8thousanders@8gmail.com">8thousanders@gmail.com</a>
      </p>
    </section>
</main>

@if (session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('pago.checkout') }}" method="POST">
    @csrf
    <button
        type="submit"
        class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition"
    >
        Contratar Prepara tu Festival
    </button>
</form>



@endsection