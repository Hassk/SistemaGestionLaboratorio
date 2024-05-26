<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();

      $data=[
        'Categoria' => $categorias,
        'status' => 200
      ];

        return response()->json($categorias, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required | max: 255',
            'descripcion' => 'required',
        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $categorias = Categorias::Create([
            'nombre' => $request -> nombre,
            'descripcion' => $request -> descripcion,
        ]);

        if (!$categorias) {
            $data = [
                'message' => 'Error al crear la categoria',
                'status' => 500
            ];
            return response() ->json($data, 500);
        }

        $data = [
            'categorias' => $categorias,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $categorias = Categorias::find($id);

        if (!$categorias){
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response() ->json($data,404);
        }

        $data = [
            'categorias' => $categorias,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function destroy ($id)
    {
         $categorias = Categorias::find($id);

         if (!$categorias) {
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
         }

         $categorias ->delete();
         $data = [
            'message' => 'Categoria eliminada',
            'status' => 200
         ];
         return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $categorias = Categorias::find($id);

        if (!$categorias){
            $data = [
                'message' => 'Categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required | max: 255',
            'descripcion' => 'required',
        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $categorias->nombre = $request->nombre;
        $categorias->descripcion = $request->descripcion;

        $categorias->save();

        $data = [
            'message' => 'categoria actualizado',
            'categorias' => $categorias,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
