<h2>Nuevo mensaje desde el formulario de contacto</h2>

<p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Asunto:</strong> {{ $data['asunto'] }}</p>

<p><strong>Mensaje:</strong></p>
<p>{!! nl2br(e($data['mensaje'])) !!}</p>

<hr>

<p><strong>Estilos que escucha:</strong>
  @if(!empty($data['estilos']))
    {{ implode(', ', $data['estilos']) }}
  @else
    (no indicado)
  @endif
</p>

<p><strong>Vive en:</strong> {{ $data['pais'] ?? '(no indicado)' }}</p>
<p><strong>Rango de edad:</strong> {{ $data['rango_edad'] ?? '(no indicado)' }}</p>

<p><strong>Favoritos:</strong></p>
@if(!empty($data['favoritos']))
  <ul>
    @foreach($data['favoritos'] as $fav)
      @if($fav)
        <li>{{ $fav }}</li>
      @endif
    @endforeach
  </ul>
@else
  <p>(no indicado)</p>
@endif
