<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = Kelas::all();
        return view("nilai.pilih_kelas", ["kelas" => $kelas, "guru" => $guru]);
    }

    public function show($id)
    {
        $nilai = DB::table("nilai_mapel_k_merdeka")
            ->where("id_kelas", $id)
            ->get();
        $kelas = Kelas::findorfail($id);
        $guru_mapel = Guru::where("id_user", Auth::user()->id)->first();
        $tahun_ajaran = TahunAjaran::all();
            return view("nilai.k_merdeka.read", [
                "nilai" => $nilai,
                "kelas" => $kelas,
                "guru_mapel" => $guru_mapel,
                "ta" => $tahun_ajaran,
            ]);
    }

    public function get_nilai(Request $request)
    {
        $kelas = Kelas::findorfail($request->id_kelas);
        $nilai = DB::table("nilai_mapel_k_merdeka")
            ->join(
                "siswa",
                "nilai_mapel_k_merdeka.nisn_siswa",
                "=",
                "siswa.nisn"
            )
            ->where(
                "nilai_mapel_k_merdeka.id_tahun_ajaran",
                $request->id_tahun_ajaran
            )
            ->where("nilai_mapel_k_merdeka.id_kelas", $request->id_kelas)
            ->where("nilai_mapel_k_merdeka.id_mapel", $request->id_mapel)
            ->where("nilai_mapel_k_merdeka.id_guru", $request->id_guru)
            ->get();
        // Fetch all records
        $response["data"] = $nilai;
        return response()->json($response);
    }

    public function input_nilai(Request $request)
    {
        $siswa = Siswa::where("id_kelas", $request->id_kelas)->get();
        $kelas = Kelas::findorfail($request->id_kelas);
        foreach ($siswa as $item) {
            $nilai_cek = DB::table("nilai_mapel_k_merdeka")
                ->join(
                    "siswa",
                    "nilai_mapel_k_merdeka.nisn_siswa",
                    "=",
                    "siswa.nisn"
                )
                ->where(
                    "nilai_mapel_k_merdeka.id_tahun_ajaran",
                    $request->id_tahun_ajaran
                )
                ->where("nilai_mapel_k_merdeka.id_kelas", $request->id_kelas)
                ->where("nilai_mapel_k_merdeka.id_mapel", $request->id_mapel)
                ->where("nilai_mapel_k_merdeka.id_guru", $request->id_guru)
                ->where("nilai_mapel_k_merdeka.nisn_siswa", $item->nisn)
                ->first();
            if ($nilai_cek == true) {
                $response = "gagal";
            } else {
                DB::table("nilai_mapel_k_merdeka")->insert([
                    "id_kelas" => $request->id_kelas,
                    "id_tahun_ajaran" => $request->id_tahun_ajaran,
                    "id_guru" => $request->id_guru,
                    "id_mapel" => $request->id_mapel,
                    "nisn_siswa" => $item->nisn,
                    "nilai_akhir" => 0,
                    "capaian" => "-",
                ]);

                $response = "berhasil";
            }
        }

        // Fetch all records
        return response()->json($response);

    }

    public function update_nilai(Request $request)
    {
        $kelas = Kelas::findorfail($request->id_kelas);
            DB::table("nilai_mapel_k_merdeka")
                ->join(
                    "siswa",
                    "nilai_mapel_k_merdeka.nisn_siswa",
                    "=",
                    "siswa.nisn"
                )
                ->where(
                    "nilai_mapel_k_merdeka.id_tahun_ajaran",
                    $request->id_tahun_ajaran
                )
                ->where("nilai_mapel_k_merdeka.id_kelas", $request->id_kelas)
                ->where("nilai_mapel_k_merdeka.id_mapel", $request->id_mapel)
                ->where("nilai_mapel_k_merdeka.id_guru", $request->id_guru)
                ->where(
                    "nilai_mapel_k_merdeka.nisn_siswa",
                    $request->nisn_siswa
                )
                ->update([
                    "nilai_akhir" => $request->nilai_akhir,
                    "capaian" => $request->capaian,
                ]);
            $response = "success";
            return response()->json($response);
            }
}
