<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // <-- Forzamos a que use exactamente la tabla 'usuario'
    
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'email',
        'telefono',
        'password',
        'rol',
    ];
}