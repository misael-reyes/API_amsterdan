<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medico;
use App\Models\Medicamento;
use App\Models\Paciente;

class Receta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_receta';

    protected $fillable = [
        'medico_id',
        'paciente_id'
    ];

    //relación uno a muchos inversa con medico
    public function medico() {
        return $this->belongsTo(Medico::class, 'medico_id', 'id_medico');
    }

    //relación uno a muchos inversa con paciente
    public function paciente() {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'id_paciente');
    }

    //relación muchos a muchos con medicameto
    public function medicamentos() {
        return $this->belongsToMany(Medicamento::class, 'medicamento_id', 'id_medicamento');
    }
}
