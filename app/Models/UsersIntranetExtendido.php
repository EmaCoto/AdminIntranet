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

    protected $fillable = ['user_id', 'field_id', 'value'];

    public function scopeNombre($query)
    {
        return $query->where('field_id', 1);
    }

    public function scopeApellido($query)
    {
        return $query->where('field_id', 2);
    }

    public function scopeUsuario($query)
    {
        return $query->where('field_id', 50);
    }

    public function scopeEtiqueta($query)
    {
        return $query->where('field_id', 50);
    }

    public function scopeUbicacion($query)
    {
        return $query->where('field_id', 53);
    }

    public function scopeCloud($query)
    {
        return $query->where('field_id', 77);
    }

    public function scopeNumero($query)
    {
        return $query->where('field_id', 76);
    }

    public function scopeCorreo($query)
    {
        return $query->where('field_id', 78);
    }

}
