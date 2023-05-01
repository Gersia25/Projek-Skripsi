<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NaikKelasController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->get();
        return view("naik_kelas.pilih_kelas", ["kelas" => $kelas]);
    }

    public function show($id)
    {
        $siswa = Siswa::where("id_kelas", $id)->get();
        $kelas = Kelas::all();
        return view("naik_kelas.view_siswa", [
            "siswa" => $siswa,
            "no" => 1,
            "kelas" => $kelas,
        ]);
    }

    public function store(Request $request)
    {
        $nisn = $request->nisn;
        $cek = DB::update(
            "UPDATE siswa SET tingkatan=tingkatan+1,id_kelas=$request->id_kelas WHERE nisn IN(" .
                implode(",", $nisn) .
                ")"
        );
        return redirect()->back();
    }
}
