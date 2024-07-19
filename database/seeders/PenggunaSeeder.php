<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::create([
            'nama' => 'Admin',
            'no_telp' => null,
            'username' => 'admin',
            'level' => 'Admin',
            'password' => Hash::make(123),
            'foto' => null
        ]);
    }
}
