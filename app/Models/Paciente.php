<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Receta;

class Paciente extends Usuario
{
    use HasFactory;

    //aclaramos a laravel el nombre del primary key
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'usuario_id'
    ];

    /**
     * función para retornar la info del usuario al que esta asignado el 
     * paciente al que estamos accediendo
     * relación uno a uno inverso
     */
    public function usuario() {
        //$usuario = Usuario::find($this->usuario_id);
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario');
    }

    //relación uno a muchos
    public function recetas() {
        return $this->hasMany(Receta::class, 'paciente_id', 'id_paciente');
    }
}
