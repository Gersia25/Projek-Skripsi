<?php

namespace App\Http\Controllers;

use App\Models\DataSekolah as ModelDataSekolah;
use Illuminate\Http\Request;

class DataSekolah extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $ds = ModelDataSekolah::all()->first();
        return view("data_sekolah.read", ["ds" => $ds]);
    }

    public function update(Request $request, $id)
    {
        $ds = ModelDataSekolah::findorfail($id);
        $ds->npsn = $request->npsn;
        $ds->nama_sekolah = $request->nama_sekolah;
        $ds->akreditasi = $request->akreditasi;
        $ds->alamat = $request->alamat;
        $ds->kode_pos = $request->kode_pos;
        $ds->telepon = $request->telepon;
        $ds->email = $request->email;
        $ds->jenjang = $request->jenjang;

        $ds->save();

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Update");
    }
}
