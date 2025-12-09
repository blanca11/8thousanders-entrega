<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoImportRequest;
use App\Services\DirectoImportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectoImportController extends Controller
{
    public function showImportForm()
    {
        return view('admin.directos.import');
    }

    public function downloadTemplate()
    {
        $headers = [
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

        $ejemplos = [
            [
                'Barcelona',
                'Primavera Sound',
                'The Strokes',
                'New York',
                'Estados Unidos',
                'Rock',
                'Rock Alternativo',
                '2024-06-01',
                '23:30',
                '8.5',
                'Concierto increíble con gran energía'
            ],
            [
                'Madrid',
                'Mad Cool',
                'Billie Eilish',
                'Los Angeles',
                'Estados Unidos',
                'Pop',
                'Pop Alternativo',
                '2024-07-12',
                '22:00',
                '9.0',
                'Impresionante puesta en escena'
            ]
        ];

        $filename = 'plantilla_directos_' . date('Y-m-d') . '.csv';
        
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        // BOM para UTF-8
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Escribir encabezados
        fputcsv($handle, $headers);
        
        // Escribir ejemplos
        foreach ($ejemplos as $ejemplo) {
            fputcsv($handle, $ejemplo);
        }
        
        fclose($handle);
        exit;
    }

    public function processImport(DirectoImportRequest $request)
    {
        try {
            $file = $request->file('csv_file');
            $filePath = $file->getRealPath();

            $service = new DirectoImportService(Auth::user());
            $results = $service->processCSV($filePath);
            $summary = $service->getSummary();

            return view('admin.directos.import-results', compact('results', 'summary'));

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}