<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $fillable = [
        'nama',
        'no_telp',
        'username',
        'level',
        'foto',
        'password',
    ];
}
