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

    protected $fillable = [
        'user_login',
        'user_pass',
        'user_nicename',
        'user_email',
        'user_url',
        'user_registered',
        'user_activation_key',
        'user_status',
        'display_name',
    ];




    // Relación con el modelo UsersIntranetExtendido
    public function profileData()
    {
        return $this->hasMany(UsersIntranetExtendido::class, 'user_id', 'ID');
    }
}
