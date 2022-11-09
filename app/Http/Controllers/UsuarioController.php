<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    public function getUserById($id, Request $request)
    {
        $user = usuario::find($id);

        if (!$user) {
            return response([
                'message' => 'Usuario no encontrado.'
            ], 404);
        }

        $num = Str::random(10);

        $user->update(['codigo_verificacion' => "$num"]);

        return response([
            'message' => 'Codigo de verificacion: ' . $num
        ], 404);
    }

    public function password(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|numeric',
            'codigo_verificacion' => 'required|string',
            'newPass' => 'required|string',
        ]);

        $usuario = usuario::where('id', $data["id"])->first();
        if ($usuario == null) {
            return response([
                'messasge' => 'Usuario no encontrado'
            ], 404);
        }
        if ($data["codigo_verificacion"] != $usuario["codigo_verificacion"]) {
            return response([
                'message' => "No coincide el codigo ingresado"
            ], 404);
        }
        $usuario->update(["codigo_verificacion" => "", "password" => $data["newPass"]]);
        return response([
            'message' => 'Cambio de contraseña exitoso'
        ]);
    }



    public function obtener()
    {
        $usuarios = usuario::all();
        return $usuarios;
    }

    public function actualizar($id, Request $request)
    {
        $usuario = usuario::find($id);

        if (!$usuario) {
            return response([
                'message' => 'Usuario no encontrado.'
            ], 404);
        }

        $data = $request->validate($this->validateRequest());
        $usuario->update($data);

        return response([
            'message' => 'Usuario actualizado.'
        ]);
    }

    public function eliminar($id)
    {
        $usuario = usuario::find($id);

        if (!$usuario) {
            return response([
                'message' => 'Usuario no encontrado.'
            ], 404);
        }

        $usuario->delete();

        return response([
            'message' => 'Usuario eliminado.'
        ]);
    }

    public function crear(Request $request)
    {
        $data = $request->validate($this->validateRequest());
        $usuario = usuario::create($data);
        return response([
            'message' => 'Usuario creado.',
            'id' => $usuario['id']
        ]);
    }

    private function validateRequest()
    {
        return [
            'nombre' => 'required|string',
            'edad' => 'required|numeric',
            'email' => 'required|email|string',
            'password' => 'required|min:5'
        ];
    }
}
