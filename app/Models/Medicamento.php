<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medida;
use App\Models\Horario;
use App\Models\Receta;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_medicamento',
        'via_administracion',
        'valor_medida',
        'horario_id',
        'medida_id'
    ];

    //relación uno a muchos inversa
    public function horario() {
        return $this->belongsTo(Horario::class, 'horario_id', 'id_horario');
    }

    //relación uno a muchos inverso
    public function medida() {
        return $this->belongsTo(Medida::class, 'medida_id', 'id_medida');
    }

    //relación muchos a muchos
    public function recetas() {
        return $this->belongsToMany(Receta::class, 'receta_id', 'id_receta');
    }
}
