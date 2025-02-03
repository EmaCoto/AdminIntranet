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

    protected $fillable = [
        'field_id',
        'user_id',
        'value',
        'last_updated',
    ];

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
        return $query->where('field_id', 3);
    }

    public function scopeCedula($query)
    {
        return $query->where('field_id', 999);
    }

    public function scopeTalla($query)
    {
        return $query->where('field_id', 1000);
    }

    public function scopeOutlook($query)
    {
        return $query->where('field_id', 558);
    }

    public function scopeCorreo($query)
    {
        return $query->where('field_id', 78);
    }

    public function scopeCorreoPersonal($query)
    {
        return $query->where('field_id', 302);
    }

    public function scopeWhatsAppCorporativo($query)
    {
        return $query->where('field_id', 559);
    }

    public function scopeWhatsApp($query)
    {
        return $query->where('field_id', 76);
    }

    public function scopeCloud($query)
    {
        return $query->where('field_id', 77);
    }

    public function scopePais($query)
    {
        return $query->where('field_id', 288);
    }

    public function scopeUbicacion($query)
    {
        return $query->where('field_id', 53);
    }

    public function scopeArea($query)
    {
        return $query->where('field_id', 760);
    }

    public function scopeEtiqueta($query)
    {
        return $query->where('field_id', 50);
    }

    public function scopeNacimiento($query)
    {
        return $query->where('field_id', 212);
    }

    public function scopeFechaIngreso($query)
    {
        return $query->where('field_id', 324);
    }

    public function scopeModalidad($query)
    {
        return $query->where('field_id', 325);
    }

}
