<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIntranetExtendido extends Model
{

    use HasFactory;

    protected $connection = 'wordpress';

    protected $table = 'dxv_bp_xprofile_data';
    protected $primaryKey = 'id'; // Asegúrate de que "ID" sea la clave primaria
    public $timestamps = false;

    public function scopeNombre($query)
    {
        return $query->where('field_id', 1);
    }

    public function scopeApellido($query)
    {
        return $query->where('field_id', 2);
    }
}
