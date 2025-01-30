<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIntranetMeta extends Model
{
    use HasFactory;

    protected $connection = 'wordpress';
    protected $table = 'dxv_usermeta';
    protected $primaryKey = 'umeta_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value',
    ];
}
