<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class LaporanPemasukanController extends Controller
{
    public function index()
    {
        $data['pemasukan'] = CatatanKeuangan::whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->where('jenis', 'Pemasukan')
            ->get();

        return view('pages.laporan.laporan-pemasukan', $data);
    }
    public function print(Request $request)
    {
        $data['pemasukan'] = CatatanKeuangan::where('jenis', 'Pemasukan')
            ->whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        return view('pages.laporan.print.print-laporan-pemasukan', $data);
    }

    // Ajax
    public function cariData(Request $request)
    {
        $data = CatatanKeuangan::where('jenis', 'Pemasukan')
            ->whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        return response()->json($data);
    }
}
