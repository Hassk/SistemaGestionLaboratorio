<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();

      $data=[
        'Producto' => $producto,
        'status' => 200
      ];

        return response()->json($producto, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required | max: 255',
            'descripcion' => 'required',
            'categoria' => 'required',
            'cantidad' => 'required',

        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $producto = Producto::Create([
            'nombre' => $request -> nombre,
            'descripcion' => $request -> descripcion,
            'categoria' => $request -> categoria,
            'cantidad' => $request -> cantidad,
        ]);

        if (!$producto) {
            $data = [
                'message' => 'Error al crear el producto',
                'status' => 500
            ];
            return response() ->json($data, 500);
        }

        $data = [
            'producto' => $producto,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto){
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response() ->json($data,404);
        }

        $data = [
            'producto' => $producto,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function destroy ($id)
    {
         $producto = Producto::find($id);

         if (!$producto) {
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
         }

         $producto ->delete();
         $data = [
            'message' => 'Producto eliminado',
            'status' => 200
         ];
         return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto){
            $data = [
                'message' => 'Producto no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required | max: 255',
            'descripcion' => 'required',
            'categoria' => 'required',
            'cantidad' => 'required',
        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categoria = $request->categoria;
        $producto->cantidad = $request->cantidad;

        $producto->save();

        $data = [
            'message' => 'Producto actualizado',
            'producto' => $producto,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
