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
        $totalProductos = Producto::count();
        $totalCategorias = Categorias::count();
        $totalPrestamos = Prestamo::count();
        $totalReportes = Reporte::count();
        $totalSolicitudes = Solicitud::count();
        $totalMantenimiento = Mantenimiento::count();
        $totalUsuarios = Usuarios::count();

        // Agrega más modelos y recuentos según sea necesario

        return view('dashboard', compact('totalProductos', 'totalCategorias', 'totalPrestamos','totalReportes','totalSolicitudes','totalMantenimiento','totalUsuarios'));
    }
}
