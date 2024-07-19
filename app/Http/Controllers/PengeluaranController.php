<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluaran'] = CatatanKeuangan::whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->where('jenis', 'Pengeluaran')
            ->get();

        return view('pages.data-pengeluaran', $data);
    }
    public function add(Request $request)
    {
        CatatanKeuangan::create([
            'tanggal' => date('Y-m-d'),
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'jenis' => 'Pengeluaran',
            'pengguna_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        CatatanKeuangan::find($id)->update($request->all());

        return redirect()->back();
    }
    public function delete($id)
    {
        CatatanKeuangan::find($id)->delete();

        return redirect()->back();
    }
}
