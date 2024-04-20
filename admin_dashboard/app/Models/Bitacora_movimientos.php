<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora_movimientos extends Model
{
    use HasFactory;

    protected $table = 'bitacora_movimientos';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'fecha_hora_movimiento',
        'tipo_movimiento',
        'detalle',
        'codigo_movimiento'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
