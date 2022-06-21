<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Web extends Model
{
    protected $collection = 'webs';
    public $timestamps = false;
    protected $fillable = [
        'account', 'listname', 'hostname', 'ip', 'status', 'port'
    ];
    use HasFactory;
}