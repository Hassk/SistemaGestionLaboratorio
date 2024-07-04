<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class SearchController extends Controller
{
    public function action(Request $request)
    {
        $query = $request->input('query');
        $productos = Producto::where('nombre', 'LIKE', "%{$query}%")
                             ->orWhere('descripcion', 'LIKE', "%{$query}%")
                             ->orWhereHas('categoria', function ($q) use ($query) {
                                 $q->where('nombre', 'LIKE', "%{$query}%");
                             })
                             ->get();

        $output = '';
        if (count($productos) > 0) {
            foreach ($productos as $producto) {
                $output .= '
                <tr>
                    <td>' . $producto->id . '</td>
                    <td>' . $producto->nombre . '</td>
                    <td>' . $producto->descripcion . '</td>
                    <td>' . $producto->categoria->nombre . '</td>
                    <td>' . $producto->cantidad . '</td>
                    <td class="' . ($producto->estado === 'disponible' ? 'text-success' : 'text-danger') . '">' . ucfirst($producto->estado) . '</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="' . route('inventario.edit', $producto->id) . '" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger delete-button" data-id="' . $producto->id . '">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-' . $producto->id . '" action="' . route('inventario.destroy', $producto->id) . '" method="POST" style="display:none;">
                                ' . csrf_field() . method_field('DELETE') . '
                            </form>
                        </div>
                    </td>
                </tr>';
            }
        } else {
            $output .= '<tr><td colspan="7">No hay resultados</td></tr>';
        }

        return response()->json(['table_data' => $output]);
    }
}
