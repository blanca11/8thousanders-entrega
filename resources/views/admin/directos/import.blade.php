@extends('layouts.app')

@section('content')
<div class="import-container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Importar Directos desde CSV</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="alert alert-info">
                        <ol>
                            <li>Descarga la plantilla CSV haciendo clic en el botón de abajo</li>
                            <li>Asegúrate de que:
                                <ul>
                                    <li>Las fechas estén en formato YYYY-MM-DD (ej: 2024-06-01)</li>
                                    <li>Las horas estén en formato HH:MM (ej: 23:30)</li>
                                    <li>Las puntuaciones sean números entre 0.0 y 10.0</li>
                                    <li>Los géneros y subgéneros existan en la base de datos</li>
                                </ul>
                            </li>
                        </ol>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('admin.directos.import.template') }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar Plantilla CSV
                        </a>
                    </div>

                    <hr>

                    <form action="{{ route('admin.directos.import.process') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="csv_file" class="form-label">Seleccionar archivo CSV:</label>
                            <input type="file" 
                                   class="form-control @error('csv_file') is-invalid @enderror" 
                                   id="csv_file" 
                                   name="csv_file" 
                                   accept=".csv"
                                   required>
                            @error('csv_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Tamaño máximo: 2MB</small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-upload"></i> Procesar CSV
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection