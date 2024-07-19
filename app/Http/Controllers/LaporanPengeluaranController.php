<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class LaporanPengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = CatatanKeuangan::whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->where('jenis', 'Pengeluaran')
            ->get();

        return view('pages.laporan.laporan-pengeluaran', $data);
    }
    public function print(Request $request)
    {
        $data['pengeluaran'] = CatatanKeuangan::where('jenis', 'Pengeluaran')
            ->whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        return view('pages.laporan.print.print-laporan-pengeluaran', $data);
    }

    // Ajax
    public function cariData(Request $request)
    {
        $data = CatatanKeuangan::where('jenis', 'Pengeluaran')
            ->whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        return response()->json($data);
    }
}
