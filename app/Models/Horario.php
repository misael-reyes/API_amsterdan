<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicamento;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'duracion',
        'dosis',
        'periodo',
        'hora_inicio'
    ];

    //relación uno a muchos
    public function medicamentos() {
        return $this->hasMany(Medicamento::class, 'horario_id', 'id_horario');
    } 
}
