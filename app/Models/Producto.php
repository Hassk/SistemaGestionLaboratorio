<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'Productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'categoria_id',
        'cantidad'
        ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
