<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora_ingresos_salidas;
use App\Models\Bitacora_movimientos;
class SecurityController extends Controller
{
    public function index_ingresos_salidas(Request $request)
    {
        //OBTENEMOS LOS DATOS
        $query = Bitacora_ingresos_salidas::query();

        //FUNCION PARA FILTRAR
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_hora_ingreso', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
        }

        //Y EL GET PARA DEVOLVER
        $bitacora = $query->get();

        //RETURN CON LOS DATOS
        return view('FrontEnd.Modernize-Admin.html.pages.bitacoraSecurity.bitacora_ingresos_salidas', compact('bitacora'));
    }




    public function index_movimientos(Request $request)
    {
        // Inicializar la consulta
        $query = Bitacora_movimientos::query();

        // Filtrar por rango de fechas si se proporcionan en la solicitud
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_hora_movimiento', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
        }

        // Obtener los registros filtrados
        $movimientos = $query->get();

        // Devolver la vista con los datos
        return view('FrontEnd.Modernize-Admin.html.pages.bitacoraSecurity.bitacora_movimientos', compact('movimientos'));
    }

}
