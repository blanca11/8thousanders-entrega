<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\SubgeneroController;
use App\Http\Controllers\ComentarioDiscoController;
use App\Http\Controllers\ComentarioDirectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectoImportController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PagoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/Prepara-festival', function () {
    return view('festivales');
})->name('prepFestival');

Route::get('/LondonWnd', function () {
    return view('london');
})->name('LondonWnd');

Route::get('/radar', function () {
    return view('radar');
})->name('radar');

Route::get('/contacto', [ContactoController::class, 'mostrarFormulario'])->name('contacto');

Route::post('/contacto/form-1', [ContactoController::class, 'enviarForm1'])
    ->name('contacto.form1.enviar');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');


Route::post('/pago/checkout', [PagoController::class, 'checkout'])
    ->name('pago.checkout');

Route::get('/pago/success', [PagoController::class, 'success'])
    ->name('pago.success');

Route::get('/pago/cancel', [PagoController::class, 'cancel'])
    ->name('pago.cancel');

Route::get('/dasboard', function () {
    return view('cliente.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rutas del área de administración: protegidas por auth y checkAdmin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard de admin (ejemplo)
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    // Formulario para registrar nuevo administrador, mostrar el formulario
    Route::get('/register-admin', [AdminRegisterController::class, 'create'])
         ->name('admin.register');

    // Procesar el formulario de registro, guardar el nuevo admin
    Route::post('/register-admin', [AdminRegisterController::class, 'store'])
         ->name('admin.register.store');
        
    //Artistas
    Route::get('/artistas', function () {
        return view('admin.artistas1'); 
    })->name('admin.artistas');

    // Página principal de “Registrar General”
    Route::get('registrar-general', function () {
        // En el closure puedes cargar los datos necesarios (artistas, géneros, subgéneros, usuarios, lugares):
        $artistas   = App\Models\Artista::orderBy('nombre')->get();
        $generos    = App\Models\Genero::orderBy('nombre_genero')->get();
        $subgeneros = App\Models\Subgenero::orderBy('nombre_subgenero')->get();
        $paises     = config('paises', []);
        $usuarios   = App\Models\User::orderBy('name')->get();
        $lugares    = App\Models\LugarDirecto::orderBy('ciudad')->orderBy('nombre')->get();

        return view('admin.registrar_general', compact(
            'artistas','generos','subgeneros','paises', 'usuarios','lugares'
        ));
    })->name('registrar_general');

    // Rutas para CRUD de Artistas
    Route::resource('artistas', ArtistaController::class);
    Route::post('lugares',     [App\Http\Controllers\LugarDirectoController::class,'store'])->name('lugar_directo.store');
    Route::post('discos',      [App\Http\Controllers\DiscoController::class,     'store'])->name('disco.store');
    Route::post('directos',    [App\Http\Controllers\DirectoController::class,   'store'])->name('directo.store');
    // Esto genera rutas: 
         // GET    /admin/artistas           -> index
         // GET    /admin/artistas/create    -> create
         // POST   /admin/artistas           -> store
         // GET    /admin/artistas/{id}      -> show
         // GET    /admin/artistas/{id}/edit -> edit
         // PUT    /admin/artistas/{id}      -> update
         // DELETE /admin/artistas/{id}      -> destroy

    // Ruta AJAX para obtener subgéneros de un género
    Route::get('artistas/subgeneros/{id_genero}', [SubgeneroController::class, 'byGenero'])->name('artistas.subgeneros');


    Route::post('discos/{disco}/comentarios', [ComentarioDiscoController::class, 'store'])
    ->name('disco.comentarios.store');

    Route::post('directos/{directo}/comentarios', [ComentarioDirectoController::class, 'store'])
    ->name('directo.comentarios.store');

    //Rutas del .csv
    Route::get('/directos/import', [DirectoImportController::class, 'showImportForm'])->name('directos.import');
    Route::post('/directos/import', [DirectoImportController::class, 'processImport'])->name('directos.import.process');
    Route::get('/directos/import/template', [DirectoImportController::class, 'downloadTemplate'])->name('directos.import.template');

    // Actualizar comentario de disco
    Route::put('discos/comentarios/{comentario}', [ComentarioDiscoController::class, 'update'])
    ->name('disco.comentarios.update');

    // Actualizar comentario de directo
    Route::put('directos/comentarios/{comentario}', [ComentarioDirectoController::class, 'update'])
        ->name('directo.comentarios.update');

});

// --- Zona de clientes ---
Route::middleware(['auth'])
     ->prefix('cliente')
     ->group(function () {
         Route::get('/dashboard', function () {
             return view('cliente.dashboard');
         })->name('cliente.dashboard');
     });