<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return $pacientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos los campos
        $request->validate([
            'nombre_completo' => 'required',
            'nombre_usuario' => 'required',
            'password' => 'required'
        ]);

        //insertamos al usuario
        $usuario = new Usuario();
        $usuario->nombre_completo = $request->nombre_completo;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->password = $request->password;
        $usuario->rol_id = $request->rol_id;
        $usuario->save();
        $id_usuario = DB::getPdo()->lastInsertId();
        //insertamos al paciente
        $paciente = new Paciente();
        $paciente->usuario_id = $id_usuario;
        $paciente->save();
        return $paciente;

        /**
         * esta forma usaremos para insertar otros objetos
         * $task = Task::create($request->all());
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->usuario;
        return $paciente;
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
        //$usuario = Usuario::findOrFail($id)->update($request->all());
        $usuario = Usuario::findOrFail($request->usuario_id);
        $usuario->nombre_completo = $request->nombre_completo;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->password = $request->password;
        $usuario->rol_id = $request->rol_id;
        $usuario->save();
        return "usuario actualizado";
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
        return "se eliminó el registro con el id: ". $id;
    }
}
