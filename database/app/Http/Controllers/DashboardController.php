<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['pemasukan'] = CatatanKeuangan::selectRaw('SUM(jumlah) as jumlah')
            ->where('jenis', 'Pemasukan')
            ->get()
            ->first();
        $data['pengeluaran'] = CatatanKeuangan::selectRaw('SUM(jumlah) as jumlah')
            ->where('jenis', 'Pengeluaran')
            ->get()
            ->first();

        return view('pages.dashboard', $data);
    }
}
