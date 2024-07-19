<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['pengguna'] = Pengguna::all();

        return view('pages.data-pengguna', $data);
    }
    public function add(Request $request)
    {
        $foto = $request->file('foto');

        if ($foto) {
            $fotoName = uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);
        } else {
            $fotoName = null;
        }

        Pengguna::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'level' => $request->level,
            'foto' => $fotoName,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $data = Pengguna::find($id);

        $foto = $request->file('foto');
        $pass = $request->password;

        if ($foto) {
            File::delete(public_path('img/' . $data->foto));

            $fotoName = uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);

            if ($pass != null) {
                $data->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'username' => $request->username,
                    'level' => $request->level,
                    'foto' => $fotoName,
                    'password' => Hash::make($pass)
                ]);
            } else {
                $data->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'username' => $request->username,
                    'level' => $request->level,
                    'foto' => $fotoName,
                ]);
            }
        } else {
            if ($pass != null) {
                $data->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'username' => $request->username,
                    'level' => $request->level,
                    'password' => Hash::make($pass)
                ]);
            } else {
                $data->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'username' => $request->username,
                    'level' => $request->level,
                ]);
            }
        }

        return redirect()->back();
    }
    public function delete($id)
    {
        $data = Pengguna::find($id);

        File::delete(public_path('img/' . $data->foto));

        $data->delete();

        return redirect()->back();
    }
}
