<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class SearchController extends Controller
{
    public function action(Request $request)
    {
        $query = $request->input('query');
        
        // Buscar productos coincidentes
        $productos = Producto::where('nombre', 'LIKE', "%{$query}%")
                             ->orWhere('descripcion', 'LIKE', "%{$query}%")
                             ->orWhereHas('categoria', function ($q) use ($query) {
                                 $q->where('nombre', 'LIKE', "%{$query}%");
                             })
                             ->get();

        // Formatear los resultados para Select2
        $results = [];
        foreach ($productos as $producto) {
            $results[] = [
                'id' => $producto->id,
                'text' => $producto->nombre
            ];
        }

        return response()->json($results);
    }
}
