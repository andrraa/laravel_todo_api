<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = ['full_name', 'email', 'password', 'is_active', 'email_verified_at', 'deleted_at'];
    public $timestamps = true;
    public $incrementing = true;
}
