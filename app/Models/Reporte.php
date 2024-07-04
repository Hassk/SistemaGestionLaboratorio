<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';

    protected $fillable = [
        'descripcion',
        'nombre_estudiante',
        'codigo_universitario',
        'facultad',
        'fecha',
        'docente_a_cargo',
        'created_at'
    ];
    
    protected $casts = [
        'fecha' => 'date',
    ];
    
}
