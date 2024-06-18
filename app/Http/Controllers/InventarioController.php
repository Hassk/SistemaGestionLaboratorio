<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;

class InventarioController extends Controller
{
    public function index()
    {
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
}
