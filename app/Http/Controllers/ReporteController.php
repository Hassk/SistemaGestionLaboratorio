<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\Usuarios;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with('usuario')->get();
        return view('reporte.index', compact('reportes'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('reporte.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Reporte::create($request->all());

        return redirect()->route('reporte.index')->with('success', 'Reporte creado con éxito');
    }

    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        $usuarios = Usuarios::all();
        return view('reporte.edit', compact('reporte', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'usuario_id' => 'required|exists:usuarios,id'
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
