<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use App\Models\Categorias; 
use App\Models\Prestamo;
use App\Models\Reporte;
use App\Models\Solicitud;
use App\Models\Mantenimiento;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducto = Producto::count();
        $totalCategorias = Categorias::count();
        $totalPrestamos = Prestamo::count();
        $totalReportes = Reporte::count();
        $totalSolicitudes = Solicitud::count();
        $totalMantenimiento = Mantenimiento::count();
        $totalUsuarios = Usuarios::count();


        return view('dashboard', compact('totalProducto', 'totalCategorias', 'totalPrestamos','totalReportes','totalSolicitudes','totalMantenimiento','totalUsuarios'));
    }
}
