<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Kehadiran;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlankoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $userId = Auth::user()->id;
        $guru = Guru::where("id_user", $userId)->first();
        if (!$guru) {
            $kelas = Kelas::all();
            return view("blanko.read_kelas", ["kelas" => $kelas]);
        } else {
            $kelas = DB::table("kelas")
                ->where("id_wali", $guru->id_guru)
                ->get();
            return view("blanko.read_kelas", ["kelas" => $kelas]);
        }
    }

    public function print_blanko($id)
    {
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::where("id_kelas", $id)->get();
        $tp = TahunAjaran::orderBy("created_at", "DESC")->first();

        // return view("blanko.new_cetak", ['siswa'=>$siswa,'no'=>1,'ttdno'=>1,'kelas'=>$kelas, "tp" => $tp]);
        $pdf = PDF::loadView("blanko.new_cetak", [
            "siswa" => $siswa,
            "no" => 1,
            "ttdno" => 1,
            "kelas" => $kelas,
            "tp" => $tp,
        ]);
        return $pdf->download("blanko_absensi.pdf");
    }
}
