<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory;

    const ADMIN_STATUS = 1;
    protected $table = 'users';

    protected $fillable = [
        'login',
        'password',
        'isAdmin'
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
