<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ]);
        $name = $request->userName;
        $pass = $request->password;
        $usuario = Usuario::where('nombre_usuario', $name)
            ->where('password', $pass)->first();
        if(isset($usuario)) {   
            $rol = $usuario->rol_id;
            switch($rol) {
                case 1: //es medico
                    $medico = Medico::where('usuario_id', $usuario->id_usuario)->first();
                    $medico->usuario;
                    return $medico;
                case 2: // es paciente
                    $paciente = Paciente::where('usuario_id', $usuario->id_usuario)->first();
                    $paciente->usuario;
                    return $paciente;
                default:
                    return "defatult";
            }
        }
        return "no existe el usuario";
    }
}
