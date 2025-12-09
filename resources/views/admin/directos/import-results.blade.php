@extends('layouts.app')

@section('content')
<div class="import-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Resultados de la Importación</h4>
                </div>

                <div class="card-body">
                    <!-- Resumen -->
                <div class="row mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Procesadas</h5>
                            <h2 class="mb-0">{{ $summary['total'] }}</h2>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">✓ Exitosas</h5>
                            <h2 class="mb-0">{{ $summary['exitosas'] }}</h2>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">✗ Con Errores</h5>
                            <h2 class="mb-0">{{ $summary['errores'] }}</h2>
                        </div>
                    </div>

                    <!-- Tabla de resultados -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fila</th>
                                    <th>Artista</th>
                                    <th>Festival</th>
                                    <th>Estado</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($results as $result)
                                    <tr class="{{ $result['estado'] === 'exito' ? 'table-success' : 'table-danger' }}">
                                        <td><strong>{{ $result['fila'] }}</strong></td>
                                        <td>{{ $result['artista'] }}</td>
                                        <td>{{ $result['festival'] }}</td>
                                        <td>
                                            @if($result['estado'] === 'exito')
                                                <span class="badge bg-success">✓ Éxito</span>
                                            @else
                                                <span class="badge bg-danger">✗ Error</span>
                                            @endif
                                        </td>
                                        <td>{{ $result['mensaje'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No hay resultados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.directos.import') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Importar Otro Archivo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection