<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
class HalamanSiswa extends Controller
{
    public function raport_saya()
    {
        $siswa = Siswa::where("id_user", Auth::user()->id)->first();
        $kelas = Kelas::findorfail($siswa->id_kelas);
        $tha = TahunAjaran::all();
        return view("halaman_siswa.raport", [
            "tha" => $tha,
            "kelas" => $kelas,
            "siswa" => $siswa,
        ]);
    }
    public function print_raport(Request $request)
    {
        $siswa = Siswa::where("id_user", Auth::user()->id)->first();
        $kelas = Kelas::findorfail($siswa->id_kelas);
        $guru = Guru::findorfail($kelas->id_wali);
        $tha = TahunAjaran::findorfail($request->id_tahun_ajaran);
        $kepsek = User::where("level", 2)->first();
        $sekolah = DB::table("data_sekolah")->first();
            if ($tha->semester == 1) {
                $nilai_merdeka_1 = DB::table("nilai_mapel_k_merdeka")
                    ->join(
                        "siswa",
                        "nilai_mapel_k_merdeka.nisn_siswa",
                        "=",
                        "siswa.nisn"
                    )
                    ->join(
                        "mapel",
                        "nilai_mapel_k_merdeka.id_mapel",
                        "=",
                        "mapel.id_mapel"
                    )
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->get();
                $nilai_extra_merdeka_1 = DB::table("nilai_extra_merdeka")
                    ->join(
                        "siswa",
                        "nilai_extra_merdeka.nisn_siswa",
                        "=",
                        "siswa.nisn"
                    )
                    ->join(
                        "mapel",
                        "nilai_extra_merdeka.id_mapel",
                        "=",
                        "mapel.id_mapel"
                    )
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->get();

                $kehadiran = DB::table("kehadiran")
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->first();

                $pdf = PDF::loadView("raport.cetak.1.merdeka", [
                    "nilai" => $nilai_merdeka_1,
                    "no1" => 1,
                    "no2" => 1,
                    "no3" => 1,
                    "no4" => 1,
                    "nilai_extra" => $nilai_extra_merdeka_1,
                    "no5" => 1,
                    "sekolah" => $sekolah,
                    "siswa" => $siswa,
                    "tha" => $tha,
                    "kelas" => $kelas,
                    "kehadiran" => $kehadiran,
                    "guru" => $guru,
                    "kepsek" => $kepsek,
                ]);

                return $pdf->stream("raport.pdf");
            } else {
                $nilai_merdeka_1 = DB::table("nilai_mapel_k_merdeka")
                    ->join(
                        "siswa",
                        "nilai_mapel_k_merdeka.nisn_siswa",
                        "=",
                        "siswa.nisn"
                    )
                    ->join(
                        "mapel",
                        "nilai_mapel_k_merdeka.id_mapel",
                        "=",
                        "mapel.id_mapel"
                    )
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->get();
                $nilai_extra_merdeka_1 = DB::table("nilai_extra_merdeka")
                    ->join(
                        "siswa",
                        "nilai_extra_merdeka.nisn_siswa",
                        "=",
                        "siswa.nisn"
                    )
                    ->join(
                        "mapel",
                        "nilai_extra_merdeka.id_mapel",
                        "=",
                        "mapel.id_mapel"
                    )
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->get();

                $kehadiran = DB::table("kehadiran")
                    ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                    ->where("nisn_siswa", $siswa->nisn)
                    ->first();

                $pdf = PDF::loadView("raport.cetak.2.merdeka", [
                    "nilai" => $nilai_merdeka_1,
                    "no1" => 1,
                    "no2" => 1,
                    "no3" => 1,
                    "no4" => 1,
                    "nilai_extra" => $nilai_extra_merdeka_1,
                    "no5" => 1,
                    "sekolah" => $sekolah,
                    "siswa" => $siswa,
                    "tha" => $tha,
                    "kelas" => $kelas,
                    "kehadiran" => $kehadiran,
                    "guru" => $guru,
                    "kepsek" => $kepsek,
                ]);

                return $pdf->stream("raport.pdf");
            }
       
    }
}
