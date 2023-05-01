<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        // $kelas = DB::table('kelas')
        //             ->join('guru','kelas.id_wali','=','guru.id_guru')
        //             ->get();
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view("data.kelas.read", [
            "kelas" => $kelas,
            "no" => 1,
            "guru" => $guru,
        ]);
    }

    public function store(Request $request)
    {
        Kelas::create([
            "tingkatan" => $request->tingkatan,
            "kode_kelas" => $request->kode_kelas,
            "id_wali" => $request->id_wali,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Simpan");
    }

    public function show($id)
    {
        $guru = Guru::all();
        $kelas = Kelas::where("tingkatan", $id)->get();
        return view("data.kelas.read", [
            "kelas" => $kelas,
            "no" => 1,
            "guru" => $guru,
        ]);
    }

    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas->delete();
        return redirect()
            ->back()
            ->with("delete", "Data Berhasil di dihapus");
    }

    public function view_siswa($id)
    {
        $siswa = Siswa::where("id_kelas", $id)->get();
        return view("data.kelas.view_siswa", ["siswa" => $siswa, "no" => 1]);
    }
}
