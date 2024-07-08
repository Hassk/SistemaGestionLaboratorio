<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Producto;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('producto')->get();
        return view('prestamo.index', compact('prestamos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('prestamo.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'nombre_estudiante' => 'required|string|max:60|regex:/^[\pL\s]+$/u',
            'codigo_universitario' => 'required|digits:10|numeric',
            'facultad' => 'required|string|max:20|regex:/^[\pL\s\-áéíóúÁÉÍÓÚ]+$/u',
            'docente_a_cargo' => 'required|string|max:60|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
        ]);

        $prestamo = Prestamo::create($request->all());

        // Actualiza el estado del producto a 'En Préstamo'
        $producto = Producto::findOrFail($request->producto_id);
        $producto->update(['estado' => 'En Préstamo']);

        return redirect()->route('prestamo.index')->with('success', 'Préstamo registrado con éxito y estado del producto actualizado.');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $productos = Producto::all();
        return view('prestamo.edit', compact('prestamo', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'nombre_estudiante' => 'required|string|max:60|regex:/^[\pL\s]+$/u',
            'codigo_universitario' => 'required|digits:10|numeric',
            'facultad' => 'required|string|max:20|regex:/^[\pL\s\-áéíóúÁÉÍÓÚ]+$/u',
            'docente_a_cargo' => 'required|string|max:60|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
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

        // Actualiza el estado del producto a 'Disponible' cuando el préstamo se elimina
        $producto = Producto::findOrFail($prestamo->producto_id);
        $producto->update(['estado' => 'Disponible']);

        $prestamo->delete();

        return redirect()->route('prestamo.index')->with('success', 'Préstamo eliminado con éxito y estado del producto actualizado');
    }

    public function finalizar($id)
    {
        try {
            $prestamo = Prestamo::findOrFail($id);
    
            // Actualiza el estado del préstamo a 'Finalizado'
            $prestamo->estado = 'Finalizado';
            $prestamo->save();
    
            // Actualiza el estado del producto a 'Disponible'
            $producto = Producto::findOrFail($prestamo->producto_id);
            $producto->update(['estado' => 'Disponible']);
    
            return redirect()->route('prestamo.index')->with('success', 'Préstamo finalizado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('prestamo.index')->with('error', 'Hubo un error al finalizar el préstamo.');
        }
    }
    
    
}
