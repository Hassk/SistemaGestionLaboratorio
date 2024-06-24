<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Usuarios; // Asegúrate de importar el modelo Usuarios
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::with('usuario')->get();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        $usuario_id = Auth::user()->id;
        return view('solicitudes.create', compact('usuario_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_solicitud' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255'
        ]);

        $data = $request->only(['tipo_solicitud', 'descripcion']);
        $data['usuario_id'] = Auth::user()->id;
        $data['estado'] = 'pendiente'; // Estado inicial

        Solicitud::create($data);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada con éxito');
    }

    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $usuarios = Usuarios::all(); // Obtén todos los usuarios y pásalos a la vista
        return view('solicitudes.edit', compact('solicitud', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);

        if (Auth::user()->hasRole('admin')) {
            $request->validate([
                'tipo_solicitud' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255'
            ]);

            $solicitud->update($request->all());
        } else {
            $request->validate([
                'tipo_solicitud' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255'
            ]);

            $solicitud->update($request->only(['tipo_solicitud', 'descripcion']));
        }

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada con éxito');
    }

    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada con éxito');
    }
}
