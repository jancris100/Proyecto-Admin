<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Authenticatable
{
    //PARA USAR ELOQUENT DE LARAVEL
    use HasFactory;
    //NOMBRE DE LA TABLA
    protected $table = 'usuarios';
    //LOS DATOS DEL MODEL
    protected $fillable = [
        'nombre_usuario',
        'password',
        'cedula',
        'nombre',
        'telefono',
        'direccion',
        'edad',
        'salario',
        'rol_id',
        'puesto_trabajo_id',
    ];
    //DATE TIMES PARA VER LOS TIEMPOS DE CREACION
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    //DECIRLE EL NAME DEL ID PRINCIPAL O PRIMARY KEY
    protected $primaryKey = 'id';

    // Relación con el puesto de trabajo
    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class, 'puesto_trabajo_id');
    }

    // Relación con el rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

}
