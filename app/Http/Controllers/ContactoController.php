<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoForm1Request;
use App\Mail\ContactoForm1Mail;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function mostrarFormulario()
    {
        // Cargar los países desde el archivo de configuración
        $paises = config('paises');
        
        // Pasar los países a la vista
        return view('contacto', compact('paises'));
    }
    public function enviarForm1(ContactoForm1Request $request)
    {
        $data = $request->validated();

        // Aquí puedes guardar en BD si quieres (contact_messages o similar)

        // Email que recibirá el mensaje (puede venir de config)
        $destino = config('mail.contact_address', 'hola@8thousanders.com');

        Mail::to($destino)->send(new ContactoForm1Mail($data));

        return back()->with('status', '¡Gracias por escribirnos! Te responderemos pronto.');
    }
}
