<?php

namespace App\Http\Controllers;

use App\Models\Detalle_receta;
use Illuminate\Http\Request;

class Detalle_recetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = Detalle_receta::all();
        return $detalles;
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
            'receta_id' => 'required',
            'medicamento_id' => 'required',
            'fecha' => 'required'
        ]);
        $detalle = Detalle_receta::create($request->all());
        return $detalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = Detalle_receta::findOrFail($id);
        return $detalle;
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
        $detalle = Detalle_receta::findOrFail($id)->update($request->all());
        return "detalle receta actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Detalle_receta::destroy($id);
        return "se elimino el detalle receta";
    }
}
