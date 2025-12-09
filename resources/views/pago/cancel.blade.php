<x-guest-layout>
    <div class="max-w-xl mx-auto text-center py-12">
        <h1 class="text-3xl font-bold mb-4">Pago cancelado</h1>
        <p class="mb-6">
            El proceso de pago se ha cancelado. Puedes volver a intentarlo cuando quieras.
        </p>
        <a href="{{ url()->previous() }}" class="text-indigo-600 hover:underline">
            Volver atrás
        </a>
    </div>
</x-guest-layout>
