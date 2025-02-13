<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'username',
        'password',
        'role', // Add role to fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Additional methods and logic if needed
}
