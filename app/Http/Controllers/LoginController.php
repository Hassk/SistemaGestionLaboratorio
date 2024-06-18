<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
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
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        Auth::login($user);
        return redirect(route('dashboard'));
    }
    
    public function login(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('dashboard');
        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function showDashboard() {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}

