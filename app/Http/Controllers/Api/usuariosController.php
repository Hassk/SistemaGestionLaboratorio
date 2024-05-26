<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class usuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();

      $data=[
        'Usuarios' => $usuarios,
        'status' => 200
      ];

        return response()->json($usuarios, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required | max: 255',
            'apellido' => 'required | max: 255',
            'correo' => 'required | email' ,
            'password' => 'required',

        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuarios = Usuarios::Create([
            'nombre' => $request -> nombre,
            'apellido' => $request -> apellido,
            'correo' => $request -> correo,
            'password' => $request -> password,
        ]);

        if (!$usuarios) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response() ->json($data, 500);
        }

        $data = [
            'usuarios' => $usuarios,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $usuarios = Usuarios::find($id);

        if (!$usuarios){
            $data = [
                'message' => 'usuario no encontrado',
                'status' => 404
            ];
            return response() ->json($data,404);
        }

        $data = [
            'usuarios' => $usuarios,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function destroy ($id)
    {
         $usuarios = Usuarios::find($id);

         if (!$usuarios) {
            $data = [
                'message' => 'usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
         }

         $usuarios ->delete();
         $data = [
            'message' => 'Usuario eliminado',
            'status' => 200
         ];
         return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $usuarios = Usuarios::find($id);

        if (!$usuarios){
            $data = [
                'message' => 'usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required | max: 255',
            'apellido' => 'required | max: 255',
            'correo' => 'required | email' ,
            'password' => 'required',
        ]);

        if($validator-> fails()){
            $data =[
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $usuarios->nombre = $request->nombre;
        $usuarios->apellido = $request->apellido;
        $usuarios->correo = $request->correo;
        $usuarios->password = $request->password;

        $usuarios->save();

        $data = [
            'message' => 'usuarios actualizado',
            'usuarios' => $usuarios,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
