<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'codigo_laboratorio',
        'codigo_fabrica',
        'nombre',
        'descripcion',
        'cantidad',
        'estado',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
