<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicamento;

class Medida extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    //relación uno a muchos
    public function medicamentos() {
        return $this->hasMany(Medicamento::class, 'medida_id', 'id_medida');
    }
}
