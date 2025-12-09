{{-- Lista de comentarios existentes --}}
<h3 class="text-lg font-semibold">Comentarios actuales</h3>
<ul class="mb-4">
  @foreach($directo->comentarios as $c)
    <li>
      <strong>{{ $c->usuario->name }}:</strong>
      "{{ $c->comentario }}" — {{ $c->puntuacion }}/10
    </li>
  @endforeach
</ul>

{{-- Si quedan menos de 3 y el usuario no ha comentado aún… --}}
@php
  $yaComentó = $directo->comentarios->contains('id_usuario', auth()->id());
@endphp

@if($directo->comentarios->count() < 3 && ! $yaComentó)
  <div class="bg-gray-50 p-4 rounded">
    <h4 class="font-medium mb-2">Añadir mi comentario</h4>
    <form action="{{ route('admin.directo.comentarios.store', $directo) }}" method="POST" class="space-y-3">
      @csrf
      <div>
        <textarea name="comentario" rows="3"
                  class="w-full border rounded">@old('comentario')</textarea>
        @error('comentario')<p class="text-red-500">{{ $message }}</p>@enderror
      </div>
      <div>
        <input type="number" name="puntuacion" step="0.1" min="0" max="10"
               value="{{ old('puntuacion') }}">
        @error('puntuacion')<p class="text-red-500">{{ $message2 }}</p>@enderror
      </div>
      <button type="submit"
              class="bg-blue-600 text-white px-3 py-1 rounded">
        Guardar comentario
      </button>
    </form>
  </div>
@endif

@if(session('success'))
  <div class="mt-3 p-2 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
@endif
