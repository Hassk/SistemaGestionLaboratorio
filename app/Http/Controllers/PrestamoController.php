<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Producto;
use App\Models\Usuarios;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['producto', 'usuario'])->get();
        return view('prestamo.index', compact('prestamos'));
    }

    public function create()
    {
        $productos = Producto::all();
        $usuarios = Usuarios::all();
        return view('prestamo.create', compact('productos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamo.index')->with('success', 'Préstamo creado con éxito');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $productos = Producto::all();
        $usuarios = Usuarios::all();
        return view('prestamo.edit', compact('prestamo', 'productos', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'descripcion' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        return redirect()->route('prestamo.index')->with('success', 'Préstamo actualizado con éxito');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamo.index')->with('success', 'Préstamo eliminado con éxito');
    }
}
