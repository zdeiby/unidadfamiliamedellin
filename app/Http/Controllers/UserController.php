<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
            public function index()
        {
            $users = User::get();

           // dd($users);

            return view('index', compact('users'));
        }

    /**
     * Muestra el formulario para crear un usuario.
     */
    public function create()
    {
        return view('create');
    }

 
    public function store(Request $request)
    {
        // Validar los campos básicos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'documento' => 'required|string|unique:users,documento',
        ]);
    
        // Verificar si ya existe un usuario con el mismo documento
        $existingUserByDocument = User::where('documento', $request->documento)->first();
        if ($existingUserByDocument) {
            return redirect()->back()->withErrors(['documento' => 'El documento ya está registrado en un usuario activo.']);
        }
    
        // Verificar si ya existe un usuario con el mismo email
        $existingUserByEmail = User::where('email', $request->email)->first();
        if ($existingUserByEmail) {
            return redirect()->back()->withErrors(['email' => 'El correo ya está registrado en un usuario activo.']);
        }
    
        // Si no hay conflictos, crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'documento' => $request->documento,
            'rol' => $request->rol,
        ]);
    
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }
    
    

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    /**
     * Actualiza un usuario en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validar los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Contraseña opcional
        ]);
    
        // Actualizar los campos
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol = $request->rol;
        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Elimina el usuario completamente de la base de datos
    
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
    
}
