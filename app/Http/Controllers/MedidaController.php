<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medida = Medida::all();
        return $medida;
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
            'descripcion' => 'required'
        ]);
        $medida = Medida::create($request->all());
        return $medida;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medida = Medida::findOrFail($id);
        return $medida;
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
        $medida = Medida::findOrFail($id)->update($request->all());
        return "medida actualizada";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medida::destroy($id);
        return "se elimino la medida";
    }
}
