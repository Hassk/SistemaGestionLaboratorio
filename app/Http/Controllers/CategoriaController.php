<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriaController extends Controller
{
    /**
     * Muestra una lista de todas las categorías.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtiene todas las categorías de la base de datos
        $categorias = Categorias::all();

        // Retorna la vista 'categorias.index' con las categorías obtenidas
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        // Retorna la vista 'categorias.create' para mostrar el formulario de creación
        return view('categorias.create');
    }

    /** Almacena una nueva categoría en la base de datos.     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        // Crea una nueva categoría con los datos validados
        Categorias::create($request->all());

        // Redirige a la vista 'categorias.index' con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito');
    }

    
    /* Muestra el formulario para editar una categoría existente. */
    public function edit($id)
    {
        // Busca la categoría por su ID, si no la encuentra lanza una excepción
        $categoria = Categorias::findOrFail($id);

        // Retorna la vista 'categorias.edit' con la categoría obtenida
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualiza una categoría existente en la base de datos.     */
    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        // Busca la categoría por su ID, si no la encuentra lanza una excepción
        $categoria = Categorias::findOrFail($id);

        // Actualiza la categoría con los datos validados
        $categoria->update($request->all());

        // Redirige a la vista 'categorias.index' con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito');
    }

    /**
     * Elimina una categoría existente de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Busca la categoría por su ID, si no la encuentra lanza una excepción
        $categoria = Categorias::findOrFail($id);

        // Elimina la categoría
        $categoria->delete();

        // Redirige a la vista 'categorias.index' con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
    }
}
