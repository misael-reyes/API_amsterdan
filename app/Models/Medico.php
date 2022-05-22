<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receta;
use App\Models\Usuario;

class Medico extends Usuario
{
    use HasFactory;

    protected $primaryKey = 'id_medico';

    protected $fillable = [
        'cedula_profesional',
        'email',
        'usuario_id'
    ];

    //relación uno a uno inverso
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuario');
    }

    //relación uno a muchos
    public function recetas() {
        return $this->hasMany(Receta::class, 'medico_id', 'id_medico');
    }
}
