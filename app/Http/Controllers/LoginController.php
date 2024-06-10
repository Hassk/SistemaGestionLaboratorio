<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Cambio de User a Usuarios
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
        ]);
    
        $user = new Usuarios();
        $user->nombre = $validatedData['nombre'];
        $user->apellido = $validatedData['apellido'];
        $user->email = $validatedData['email'];  // Corrección aquí
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        Auth::login($user);
        return redirect(route('privada'));
    }
    
    public function login(Request $request){
        //Validar login
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            //"active" =>true
        ];
        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('privada'); // Redirige a la dashboard o ruta deseada
        } else {
            return redirect('login'); // Considera mostrar un mensaje de error aquí
        }
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
