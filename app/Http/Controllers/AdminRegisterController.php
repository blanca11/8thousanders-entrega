<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminRegisterController extends Controller
{
    // Este método muestra el formulario de registro de admins
    public function create()
    {
        return view('admin.register'); 
    }

    // Este método procesa el formulario y crea el administrador
    public function store(Request $request)
    {
        // Validar los campos: nombre, email, password, password_confirmation
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'confirmed', Password::defaults()],
        ]);

        // Creamos el usuario con role = 'admin'
        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'admin',
        ]);

        // Redirigimos a un listado o a la misma forma con mensaje de éxito
        return redirect()->route('admin.admin.dashboard')
                         ->with('success', 'Administrador creado correctamente.');
    }
}
