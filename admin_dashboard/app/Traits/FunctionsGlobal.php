<?php

namespace App\Traits;

use App\Models\Bitacora_movimientos;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

trait FunctionsGlobal
{
    //FUNCION GLOBAL PARA REGISTRAR LOS MOVIMIENTOS
    public function registrarMovimiento($tipo, $detalle, $usuario_id)
    {

        $codigo_movimiento = Str::random(8);
        $fecha_hora_movimiento = now();

        $bitacoraMovimiento = new Bitacora_movimientos();
        $bitacoraMovimiento->codigo_movimiento = $codigo_movimiento;
        $bitacoraMovimiento->fecha_hora_movimiento = $fecha_hora_movimiento;
        $bitacoraMovimiento->tipo_movimiento = $tipo;
        $bitacoraMovimiento->detalle = $detalle;
        $bitacoraMovimiento->usuario_id = $usuario_id;
        $bitacoraMovimiento->save();



    }
}
