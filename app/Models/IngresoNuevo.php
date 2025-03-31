<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoNuevo extends Model
{
    use HasFactory;

        // Nombre de la tabla
        protected $table = 'ingresos_nuevos';

        // Atributos que se pueden asignar masivamente
        protected $fillable = ['nombre', 'gmail', 'estado'];



    // Si necesitas deshabilitar la asignación masiva para ciertos campos, puedes usar $guarded en lugar de $fillable:
    // protected $guarded = []; // Esto significa que puedes asignar todos los campos
}
