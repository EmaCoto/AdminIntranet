<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIntranetActivity extends Model
{
    use HasFactory;

    protected $connection = 'wordpress';
    protected $table = 'dxv_bp_activity';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'component',
        'type',
        'action',
        'content',
        'primary_link',
        'date_recorded',
    ];
}
