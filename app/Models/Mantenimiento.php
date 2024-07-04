<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';

    protected $fillable = [
        'producto_id',
        'usuario_id',
        'descripcion',
        'tipo',
        'fecha_inicio',
        'fecha_fin'
    ];

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}
