<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class LaporanKomulatifController extends Controller
{
    public function index()
    {
        $data['pemasukanPengeluaran'] = CatatanKeuangan::whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->get();

        return view('pages.laporan.laporan-komulatif', $data);
    }
    public function print(Request $request)
    {
        $data['pemasukanPengeluaran'] = CatatanKeuangan::whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        return view('pages.laporan.print.print-laporan-komulatif', $data);
    }

    // Ajax
    public function cariData(Request $request)
    {
        $data = CatatanKeuangan::whereBetween('tanggal', [$request->start, $request->end])
            ->get();

        // dd($data);

        return response()->json($data);
    }
}
