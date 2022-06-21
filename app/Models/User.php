<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Model
{
    protected $collection = 'users';
    public $timestamps = false;
    protected $fillable = [
        'name', 'account', 'password', 'email', 'phone', 'role'
    ];
    protected $attributes = [
        'role' => 'user'
    ];
    use HasFactory;
}