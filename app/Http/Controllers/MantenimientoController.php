<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use App\Models\Producto;
use App\Models\Usuarios;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with(['producto', 'usuario'])->get();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        $productos = Producto::all();
        $usuarios = Usuarios::all();
        return view('mantenimientos.create', compact('productos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id', // Cambié 'producto' a 'productos' aquí
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255'
        ]);

        Mantenimiento::create($request->all());

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento creado con éxito');
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $productos = Producto::all();
        $usuarios = Usuarios::all();
        return view('mantenimientos.edit', compact('mantenimiento', 'producto', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id', // Cambié 'producto' a 'productos' aquí
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255'
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->update($request->all());

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado con éxito');
    }

    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado con éxito');
    }
}
