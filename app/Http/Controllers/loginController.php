<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $usuario = usuario::where('email', $data['email'])
        ->where('password', $data['password'])
        ->first();

        if(!$usuario)
        {
            return response([
                'message' => 'Datos no encontrados.'
            ],404);
        }

        $token = $usuario->createToken('app_token')->plainTextToken;

        return response([
            'User' => $usuario,
            'token' => $token
        ]);
    }
}
