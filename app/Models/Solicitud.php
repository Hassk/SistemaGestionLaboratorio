<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'nombre_estudiante',
        'codigo_universitario',
        'facultad',
        'docente_a_cargo',
        'solicitud',
        'fecha_solicitud',
        'estado',
    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
    ];
}
