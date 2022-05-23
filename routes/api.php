<?php

use App\Http\Controllers\Detalle_recetaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RecetaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas para los pacientes
Route::apiResource('pacientes', PacienteController::class);
//rutas para los medicos
Route::apiResource('medicos', MedicoController::class);
//rutas para los horarios
Route::apiResource('horarios', HorarioController::class);
//rutas para los medicamentos
Route::apiResource('medicamentos', MedicamentoController::class);
//rutas para las recetas
Route::apiResource('recetas', RecetaController::class);
//rutas para los detalles de las recetas
Route::apiResource('detalle_recetas', Detalle_recetaController::class);