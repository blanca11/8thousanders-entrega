<?php

namespace App\Services;

use App\Models\Genero;
use App\Models\Subgenero;
use App\Models\Artista;
use App\Models\LugarDirecto;
use App\Models\Directo;
use App\Models\ComentarioDirecto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DirectoImportService
{
    protected $user;
    protected $results = [];
    protected $paises;

    public function __construct($user)
    {
        $this->user = $user;
        $this->paises = config('paises');
    }

    public function processCSV($filePath)
    {
        $this->results = [];
        
        $content = file_get_contents($filePath);
        
        // Quitar BOM si existe
        $content = str_replace("\xEF\xBB\xBF", '', $content);
        
        // Separar en líneas
        $lines = explode("\n", $content);
        $lines = array_map('trim', $lines);
        $lines = array_filter($lines); // Eliminar líneas vacías
        
        if (empty($lines)) {
            throw new \Exception('El archivo CSV está vacío');
        }
        
        // Detectar delimitador de la primera línea
        $firstLine = $lines[0];
        $delimiter = substr_count($firstLine, ';') > substr_count($firstLine, ',') ? ';' : ',';
        
        // Procesar encabezados
        $headers = str_getcsv($lines[0], $delimiter);
        $headers = array_map('trim', $headers);
        
        $expectedHeaders = [
            'festival_ciudad',
            'festival_nombre',
            'artista_nombre',
            'artista_ciudad',
            'artista_pais',
            'genero',
            'subgenero',
            'fecha_directo',
            'hora_directo',
            'puntuacion',
            'comentario'
        ];

        if ($headers !== $expectedHeaders) {
            $foundHeaders = implode(', ', $headers);
            $expectedHeadersStr = implode(', ', $expectedHeaders);
            throw new \Exception("Columnas incorrectas. Encontradas: [{$foundHeaders}]. Esperadas: [{$expectedHeadersStr}]");
        }

        // Procesar filas de datos
        $rowNumber = 1;
        for ($i = 1; $i < count($lines); $i++) {
            $rowNumber++;
            
            if (empty($lines[$i])) {
                continue;
            }
            
            $row = str_getcsv($lines[$i], $delimiter);
            
            if (count($row) !== count($headers)) {
                continue; // Saltar filas con número incorrecto de columnas
            }
            
            $data = array_combine($headers, $row);
            $this->processRow($data, $rowNumber);
        }

        return $this->results;
    }

    protected function processRow($data, $rowNumber)
    {
        try {
            // Validar campos obligatorios
            $errors = $this->validateRequiredFields($data);
            if (!empty($errors)) {
                $this->addResult($rowNumber, $data, 'error', implode('. ', $errors));
                return;
            }

            // Validar formato de datos
            $errors = $this->validateFormats($data);
            if (!empty($errors)) {
                $this->addResult($rowNumber, $data, 'error', implode('. ', $errors));
                return;
            }

            DB::beginTransaction();

            try {
                // 1. Validar y crear/obtener lugar (festival)
                $lugar = $this->getOrCreateLugar($data['festival_ciudad'], $data['festival_nombre']);

                // 2. Validar país
                if (!$this->validatePais($data['artista_pais'])) {
                    throw new \Exception("País '{$data['artista_pais']}' no válido. Debe ser uno de los países disponibles");
                }

                // 3. Validar género
                $genero = $this->validateGenero($data['genero']);
                if (!$genero) {
                    throw new \Exception("El género '{$data['genero']}' no existe en la base de datos");
                }

                // 4. Validar subgénero
                $subgenero = $this->validateSubgenero($data['subgenero'], $genero->id_genero);
                if (!$subgenero) {
                    throw new \Exception("El subgénero '{$data['subgenero']}' no existe o no pertenece al género '{$data['genero']}'");
                }

                // 5. Crear o obtener artista
                $artista = $this->getOrCreateArtista(
                    $data['artista_nombre'],
                    $data['artista_ciudad'],
                    $data['artista_pais'],
                    $genero->id_genero,
                    $subgenero->id_subgenero
                );

                // 6. Crear fecha y hora combinadas
                $fechaHora = Carbon::createFromFormat('Y-m-d H:i', $data['fecha_directo'] . ' ' . $data['hora_directo']);

                // 7. Validar duplicado de directo
                $directoExistente = Directo::where('id_artista', $artista->id_artista)
                    ->where('id_lugar', $lugar->id_lugar)
                    ->where('fecha', $fechaHora)
                    ->first();

                if ($directoExistente) {
                    // Verificar si el usuario ya comentó este directo
                    $comentarioExistente = ComentarioDirecto::where('id_directo', $directoExistente->id_directo)
                        ->where('id_usuario', $this->user->id)
                        ->first();

                    if ($comentarioExistente) {
                        throw new \Exception("Ya has comentado este directo anteriormente");
                    }

                    // Crear solo el comentario
                    ComentarioDirecto::create([
                        'id_directo' => $directoExistente->id_directo,
                        'id_usuario' => $this->user->id,
                        'comentario' => $data['comentario'],
                        'puntuacion' => $data['puntuacion'],
                    ]);

                    DB::commit();
                    $this->addResult($rowNumber, $data, 'exito', 'Comentario agregado a directo existente');
                    return;
                }

                // 8. Crear directo
                $directo = Directo::create([
                    'id_artista' => $artista->id_artista,
                    'id_lugar' => $lugar->id_lugar,
                    'fecha' => $fechaHora,
                    'puntuacion' => null, // Inicialmente null
                ]);

                // 9. Crear comentario
                ComentarioDirecto::create([
                    'id_directo' => $directo->id_directo,
                    'id_usuario' => $this->user->id,
                    'comentario' => $data['comentario'],
                    'puntuacion' => $data['puntuacion'],
                ]);

                DB::commit();
                $this->addResult($rowNumber, $data, 'exito', 'Directo y comentario insertados correctamente');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } catch (\Exception $e) {
            $this->addResult($rowNumber, $data, 'error', $e->getMessage());
        }
    }

    protected function validateRequiredFields($data)
    {
        $errors = [];
        $requiredFields = [
            'festival_ciudad' => 'Ciudad del festival',
            'festival_nombre' => 'Nombre del festival',
            'artista_nombre' => 'Nombre del artista',
            'artista_pais' => 'País del artista',
            'genero' => 'Género',
            'subgenero' => 'Subgénero',
            'fecha_directo' => 'Fecha del directo',
            'hora_directo' => 'Hora del directo',
            'puntuacion' => 'Puntuación',
            'comentario' => 'Comentario',
        ];

        foreach ($requiredFields as $field => $label) {
            if (empty(trim($data[$field] ?? ''))) {
                $errors[] = "El campo '{$label}' es obligatorio";
            }
        }

        return $errors;
    }

    protected function validateFormats($data)
    {
        $errors = [];

        // Validar fecha
        if (!empty($data['fecha_directo'])) {
            $fecha = Carbon::createFromFormat('Y-m-d', $data['fecha_directo'], null);
            if (!$fecha || $fecha->format('Y-m-d') !== $data['fecha_directo']) {
                $errors[] = "Formato de fecha inválido. Debe ser YYYY-MM-DD";
            }
        }

        // Validar hora
        if (!empty($data['hora_directo'])) {
            if (!preg_match('/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/', $data['hora_directo'])) {
                $errors[] = "Formato de hora inválido. Debe ser HH:MM (24 horas)";
            }
        }

        // Validar puntuación
        if (!empty($data['puntuacion'])) {
            $puntuacion = floatval($data['puntuacion']);
            if ($puntuacion < 0 || $puntuacion > 10) {
                $errors[] = "La puntuación debe estar entre 0.0 y 10.0";
            }
        }

        return $errors;
    }

    protected function validatePais($pais)
    {
        $paisNormalizado = trim($pais);
        
        foreach ($this->paises as $paisValido) {
            if (strcasecmp($paisNormalizado, $paisValido) === 0) {
                return true;
            }
        }

        return false;
    }

    protected function validateGenero($nombreGenero)
    {
        return Genero::whereRaw('LOWER(nombre_genero) = ?', [strtolower(trim($nombreGenero))])->first();
    }

    protected function validateSubgenero($nombreSubgenero, $idGenero)
    {
        return Subgenero::whereRaw('LOWER(nombre_subgenero) = ?', [strtolower(trim($nombreSubgenero))])
            ->where('id_genero', $idGenero)
            ->first();
    }

    protected function getOrCreateLugar($ciudad, $nombre)
    {
        $lugar = LugarDirecto::where('nombre', trim($nombre))
            ->where('ciudad', trim($ciudad))
            ->first();

        if (!$lugar) {
            $lugar = LugarDirecto::create([
                'ciudad' => trim($ciudad),
                'nombre' => trim($nombre),
                'es_festival' => 1,
            ]);
        }

        return $lugar;
    }

    protected function getOrCreateArtista($nombre, $ciudad, $pais, $idGenero, $idSubgenero)
    {
        $artista = Artista::whereRaw('LOWER(nombre) = ?', [strtolower(trim($nombre))])->first();

        if (!$artista) {
            $artista = Artista::create([
                'nombre' => trim($nombre),
                'ciudad' => !empty(trim($ciudad)) ? trim($ciudad) : null,
                'pais' => trim($pais),
                'id_genero' => $idGenero,
                'id_subgenero' => $idSubgenero,
            ]);
        }

        return $artista;
    }

    protected function addResult($rowNumber, $data, $estado, $mensaje)
    {
        $this->results[] = [
            'fila' => $rowNumber,
            'artista' => $data['artista_nombre'] ?? 'N/A',
            'festival' => $data['festival_nombre'] ?? 'N/A',
            'estado' => $estado,
            'mensaje' => $mensaje,
        ];
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getSummary()
    {
        $total = count($this->results);
        $exitosas = collect($this->results)->where('estado', 'exito')->count();
        $errores = collect($this->results)->where('estado', 'error')->count();

        return [
            'total' => $total,
            'exitosas' => $exitosas,
            'errores' => $errores,
        ];
    }
}