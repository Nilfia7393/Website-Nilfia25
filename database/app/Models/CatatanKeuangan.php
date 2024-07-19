<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKeuangan extends Model
{
    protected $table = 'catatan_keuangans';
    protected $fillable = [
        'tanggal',
        'jenis',
        'nama',
        'jumlah',
        'keterangan',
        'pengguna_id'
    ];
}
