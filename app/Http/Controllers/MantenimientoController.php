<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use App\Models\Producto;
use App\Models\Usuarios;
use Carbon\Carbon;

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
            'producto_id' => 'required|exists:producto,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date'
        ]);

        $mantenimiento = Mantenimiento::create($request->all());
        $producto = Producto::findOrFail($request->producto_id);
        $producto->update(['estado' => 'en mantenimiento']);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento creado con éxito.');
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $productos = Producto::all();
        $usuarios = Usuarios::all();
        return view('mantenimientos.edit', compact('mantenimiento', 'productos', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date'
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->update($request->all());

        // Actualiza el estado del producto al finalizar el mantenimiento, si se proporciona fecha_fin
        if ($request->filled('fecha_fin')) {
            $producto = Producto::findOrFail($request->producto_id);
            $producto->update(['estado' => 'disponible']);
        }

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado con éxito.');
    }

    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();

        // Opcional: Actualizar el estado del producto al eliminar el mantenimiento
        $producto = Producto::findOrFail($mantenimiento->producto_id);
        $producto->update(['estado' => 'disponible']);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado con éxito.');
    }

    public function finalize(Request $request, $id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->update([
            'fecha_fin' => now(), // Actualiza la fecha de fin al momento actual
            'estado' => 'finalizado' // Cambia el estado a finalizado
        ]);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento finalizado con éxito.');
    }
}
