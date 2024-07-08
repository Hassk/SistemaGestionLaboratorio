<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'nombre_estudiante',
        'codigo_universitario',
        'facultad',
        'docente_a_cargo',
        'descripcion',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado'
    ];
    
    protected $dates = ['fecha_prestamo', 'fecha_devolucion']; 

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
