<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        return $medicos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'nombre_usuario' => 'required',
            'password' => 'required',
            'cedula_profesional' => 'required',
            'email' => 'required'
        ]);

        //insertamos al usuario
        $usuario = new Usuario();
        $usuario->nombre_completo = $request->nombre_completo;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->password = $request->password;
        $usuario->save();
        $id_usuario = DB::getPdo()->lastInsertId();
        //insertamos al medico
        $medico = new Medico();
        $medico->usuario_id = $id_usuario;
        $medico->cedula_profesional = $request->cedula_profesional;
        $medico->email = $request->email;
        $medico->save();
        return $medico;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->usuario;
        return $medico;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizamos al usuario
        $usuario = Usuario::findOrFail($request->usuario_id);
        $usuario->nombre_completo = $request->nombre_completo;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->password = $request->password;
        $usuario->save();
        //actualizamos al medico
        $medico = Medico::findOrFail($id);
        $medico->cedula_profesional = $request->cedula_profesional;
        $medico->email = $request->email;
        $medico->save();
        return "medico actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        return "se eliminó el usuario";
    }
}
