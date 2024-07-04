<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'usuario_id',
        'tipo_solicitud',
        'estado',
        'descripcion',
        'fecha_solicitud'
    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}
