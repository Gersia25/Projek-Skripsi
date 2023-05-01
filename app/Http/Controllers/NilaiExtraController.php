<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NilaiExtraController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = Kelas::all();
        return view("nilai_extra.pilih_kelas", [
            "kelas" => $kelas,
            "guru" => $guru,
        ]);
    }

    public function show($id)
    {
        $kelas = Kelas::findorfail($id);
        $guru_mapel = Guru::where("id_user", Auth::user()->id)->first();
        $tahun_ajaran = TahunAjaran::all();
        $siswa = Siswa::where("id_kelas", $id)->get();
            return view("nilai_extra.k_merdeka.read", [
                "kelas" => $kelas,
                "guru_mapel" => $guru_mapel,
                "ta" => $tahun_ajaran,
                "siswa" => $siswa,
            ]);
    }

    public function get_nilai_extra(Request $request)
    {
        $kelas = Kelas::findorfail($request->id_kelas);
            $nilai = DB::table("nilai_extra_merdeka")
                ->join(
                    "siswa",
                    "nilai_extra_merdeka.nisn_siswa",
                    "=",
                    "siswa.nisn"
                )
                ->where(
                    "nilai_extra_merdeka.id_tahun_ajaran",
                    $request->id_tahun_ajaran
                )
                ->where("nilai_extra_merdeka.id_kelas", $request->id_kelas)
                ->where("nilai_extra_merdeka.id_mapel", $request->id_mapel)
                ->where("nilai_extra_merdeka.id_guru", $request->id_guru)
                ->get();
            // Fetch all records
            $response["data"] = $nilai;
            return response()->json($response);
    }

    public function input_nilai_extra(Request $request)
    {
        $kelas = Kelas::findorfail($request->id_kelas);
            DB::table("nilai_extra_merdeka")->insert([
                "id_kelas" => $request->id_kelas,
                "id_tahun_ajaran" => $request->id_tahun_ajaran,
                "id_guru" => $request->id_guru,
                "id_mapel" => $request->id_mapel,
                "nisn_siswa" => $request->nisn_siswa,
                "ket" => $request->ket,
            ]);

            $response = "berhasil";
            return response()->json($response);
           
    }

    public function hapus_nilai_extra(Request $request)
    {
        $nilai = DB::table("nilai_extra_merdeka")->where(
            "id_nilai",
            $request->id_nilai
        );
        $nilai->delete();

        $response = "berhasil";
        return response()->json($response);
    }
}
