<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('reporte.index', compact('reportes'));
    }

    public function create()
    {
        return view('reporte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'nombre_estudiante' => 'required|string|max:255',
            'codigo_universitario' => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
            'fecha' => 'required|date',
            'docente_a_cargo' => 'required|string|max:255'
        ]);

        Reporte::create($request->all());

        return redirect()->route('reporte.index')->with('success', 'Reporte creado con éxito');
    }

    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('reporte.edit', compact('reporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'nombre_estudiante' => 'required|string|max:255',
            'codigo_universitario' => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
            'fecha' => 'required|date',
            'docente_a_cargo' => 'required|string|max:255'
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());

        return redirect()->route('reporte.index')->with('success', 'Reporte actualizado con éxito');
    }

    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();

        return redirect()->route('reporte.index')->with('success', 'Reporte eliminado con éxito');
    }
}
