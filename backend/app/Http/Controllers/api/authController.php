<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (! $usuario || ! Hash::check($request->contrasena, $usuario->contrasena)) {
            throw ValidationException::withMessages([
                'correo' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'usuario' =>  $usuario->load('rol'),
        ], 200);
    }

    public function logout(Request $request)
{
    // Elimina el token del usuario autenticado
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Sesión cerrada correctamente',
    ], 200);
}


   public function perfil(Request $request)
    {
        // Obtener el usuario autenticado
        $usuario = $request->user(); 

        // Verificar si el usuario existe
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Cargar la relación rol, si es necesario
        $usuario->load('rol'); 

        // Retornar los datos del usuario
        return response()->json($usuario, 200);
    }



    public function actualizarPerfil(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        // Obtener el usuario autenticado
        $usuario = $request->user();

        // Actualizar los datos del usuario
        $usuario->update($validatedData);

        // Retornar una respuesta de éxito
        return response()->json(['message' => 'Perfil actualizado correctamente'], 200);
    }


}
