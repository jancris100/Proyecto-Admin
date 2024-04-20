<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora_ingresos_salidas extends Model
{
    use HasFactory;

    protected $table = 'bitacora_ingresos_salidas';

    protected $fillable = [
        'codigo_ingreso',
        'usuario_id',
        'fecha_hora_ingreso',
        'fecha_hora_salida',
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
