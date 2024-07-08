<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SolicitudController extends Controller
{
    // Muestra todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    // Muestra el formulario para crear una nueva solicitud
    public function create()
    {
        return view('solicitudes.create');
    }

    // Guarda una nueva solicitud en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_estudiante' => 'required|string|max:60',
            'codigo_universitario' => 'required|digits:10',
            'facultad' => 'required|string|max:20',
            'docente_a_cargo' => 'required|string|max:60',
            'solicitud' => 'required|string|max:255',
            'fecha_solicitud' => 'required|date',
        ]);

        $data = $request->only([
            'nombre_estudiante',
            'codigo_universitario',
            'facultad',
            'docente_a_cargo',
            'solicitud',
            'fecha_solicitud',
        ]);

        // Asignar estado por defecto
        $data['estado'] = 'En Proceso';
        $data['usuario_id'] = Auth::id(); // Obtener el ID del usuario autenticado

        Solicitud::create($data);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada con éxito');
    }

    // Muestra el formulario para editar una solicitud existente
    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.edit', compact('solicitud'));
    }

    // Actualiza una solicitud existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_estudiante' => 'required|string|max:60',
            'codigo_universitario' => 'required|digits:10',
            'facultad' => 'required|string|max:20',
            'docente_a_cargo' => 'required|string|max:60',
            'solicitud' => 'required|string|max:255',
            'fecha_solicitud' => 'required|date',
        ]);

        $data = $request->only([
            'nombre_estudiante',
            'codigo_universitario',
            'facultad',
            'docente_a_cargo',
            'solicitud',
            'fecha_solicitud',
        ]);

        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($data);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada con éxito');
    }

    // Elimina una solicitud de la base de datos
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada con éxito');
    }

    // Aprueba una solicitud
    public function aprobar($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'Aprobada'; // Cambiar el estado a aprobada
        $solicitud->save();

        return redirect()->back()->with('success', 'Solicitud aprobada exitosamente');
    }

    // Rechaza una solicitud
    public function rechazar($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'Rechazada'; // Cambiar el estado a Rechazada
        $solicitud->save();

        return redirect()->back()->with('success', 'Solicitud rechazada exitosamente');
    }

    // Aprueba una solicitud y muestra un mensaje de éxito
    public function approve(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'Aprobada';
        $solicitud->save();

        Alert::success('Éxito', 'Solicitud Aprobada exitosamente');

        return redirect()->route('solicitudes.index');
    }

    // Rechaza una solicitud y muestra un mensaje de éxito
    public function reject(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'Rechazada';
        $solicitud->save();

        Alert::success('Éxito', 'Solicitud Rechazada exitosamente');

        return redirect()->route('solicitudes.index');
    }
}
