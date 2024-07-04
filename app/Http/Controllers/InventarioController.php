<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search');
            $productos = Producto::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%$search%")
                             ->orWhere('descripcion', 'like', "%$search%")
                             ->orWhereHas('categoria', function ($q) use ($search) {
                                 $q->where('nombre', 'like', "%$search%");
                             });
            })->get();

            return response()->json($productos);
        }

        $productos = Producto::all();
        $categorias = Categorias::all();

        return view('inventario.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('inventario.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'cantidad' => 'required|integer',
        ]);

        Producto::create($request->all());

        return redirect()->route('inventario.index')->with('success', 'Producto creado con éxito');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categorias::all();
        return view('inventario.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'cantidad' => 'required|integer',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('inventario.index')->with('success', 'Producto actualizado con éxito');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('inventario.index')->with('success', 'Producto eliminado con éxito');
    }

    // Método para la búsqueda en vivo
    public function liveSearch(Request $request)
    {
        $search = $request->input('query');

        $productos = Producto::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', "%$search%")
                         ->orWhere('descripcion', 'like', "%$search%")
                         ->orWhereHas('categoria', function ($q) use ($search) {
                             $q->where('nombre', 'like', "%$search%");
                         });
        })->get();

        $output = '';
        if ($productos->count() > 0) {
            foreach ($productos as $index => $producto) {
                $output .= '
                <tr>
                    <td>' . ($index + 1) . '</td>
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
