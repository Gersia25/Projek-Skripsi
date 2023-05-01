<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DataSekolah as ModelDataSekolah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $siswa = Siswa::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $tha = TahunAjaran::where("status", 2)->first();
        $ds = ModelDataSekolah::all()->first();

        $guru_login = DB::table("guru")
            ->leftjoin("kelas", "guru.id_guru", "=", "kelas.id_wali")
            ->join("mapel", "guru.id_mapel", "=", "mapel.id_mapel")
            ->where("id_user", Auth::user()->id)
            ->first();
        return view("home", [
            "siswa" => $siswa,
            "guru" => $guru,
            "kelas" => $kelas,
            "mapel" => $mapel,
            "tha" => $tha,
            "ds" => $ds,
            "guru_login" => $guru_login,
        ]);
    }
}
