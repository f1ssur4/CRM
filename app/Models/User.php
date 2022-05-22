<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory;

    const ADMIN_STATUS = 1;
    const MAIN_ADMIN_STATUS = 2;
    protected $table = 'users';

    protected $fillable = [
        'login',
        'password',
        'status_id'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
