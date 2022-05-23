<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::all();
        return $horarios;
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
            'fecha_inicio' => 'required',
            'duracion' => 'required',
            'dosis' => 'required',
            'periodo' => 'required',
            'hora_inicio' => 'required'
        ]);

        $horario = Horario::findOrFail($request->all());
        return $horario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return $horario;
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
        $horario = Horario::findOrFail($id)->update($request->all());
        return "horario actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Horario::destroy($id);
        return "se elimino el horario";
    }
}
