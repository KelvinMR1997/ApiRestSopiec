<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'serial',
        'marca',
        'nombre',
        'tipo',
        'modelo',
        'procesador',
        'ram',
        'disco_duro',
        'sistema_operativo',
        'estado_equipo'
    ];

    protected $hidden =[
        'created_at',
        'updated_at'
    ];
}
