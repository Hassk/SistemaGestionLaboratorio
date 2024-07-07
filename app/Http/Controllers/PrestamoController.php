<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Producto;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('producto')->get();
        return view('prestamo.index', compact('prestamos'));
    }

    public function create()
    {
        $productos = Producto::all(); // Asegúrate de que el nombre de la tabla en el modelo Producto es correcto.
        return view('prestamo.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:Producto,id', // Corrige el nombre de la tabla si es necesario.
            'nombre_estudiante' => 'required|string|max:255',
            'codigo_universitario' => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
            'docente_a_cargo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
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
        $productos = Producto::all(); // Verifica que esta consulta está correcta.
        return view('prestamo.edit', compact('prestamo', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:Producto,id',
            'nombre_estudiante' => 'required|string|max:255',
            'codigo_universitario' => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
            'docente_a_cargo' => 'required|string|max:255',
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
        
        // Actualiza el estado del producto a 'Disponible' cuando el préstamo se elimina
        $producto = Producto::findOrFail($prestamo->producto_id);
        $producto->update(['estado' => 'Disponible']);

        $prestamo->delete();

        return redirect()->route('prestamo.index')->with('success', 'Préstamo eliminado con éxito y estado del producto actualizado');
    }
}
