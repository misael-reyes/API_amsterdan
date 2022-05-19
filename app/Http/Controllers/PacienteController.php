<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{

    protected $table = 'usuarios';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::where('id_paciente',1)->first();
        return $pacientes->usuario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insertamos al usuario
        $paciente = new Paciente();
        $paciente->nombre_completo = $request->nombre_completo;
        $paciente->nombre_usuario = $request->nombre_usuario;
        $paciente->password = $request->password;
        //$id_usuario = DB::getPdo()->lastInsertId();
        //insertamos al paciente
        //$paciente->usuario_id = $id_usuario;
        $paciente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
