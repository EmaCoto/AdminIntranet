<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIntranet extends Model
{

    use HasFactory;
    protected $connection = 'wordpress';

    protected $table = 'dxv_users';
    protected $primaryKey = 'ID'; // Asegúrate de que "ID" sea la clave primaria
    public $timestamps = false;
}
