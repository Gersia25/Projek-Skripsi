<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Kehadiran;
use App\Models\TahunAjaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RaportController extends Controller
{
    public function hasil_sikap(Request $request)
    {
        $guru = Guru::where(
            "id_user",
            $request->teacher_id ?? Auth::user()->id
        )->first();
        $teachers = Guru::all();
        $action = "raport/hasil-sikap-spritual-sosial";

        if (!$guru) {
            return view("raport.pilih_guru", compact(["teachers", "action"]));
        }
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $th = TahunAjaran::all();

        return view("raport.pilih_tahun_ajaran", [
            "th" => $th,
            "no" => 1,
            "kelas" => $kelas,
        ]);
    }

    public function hasil_sikap_show($id)
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $ta = $id;
        $tha = TahunAjaran::findorfail($id);
        $hasil = DB::table("hasil_rapat_sikap_spritual_sosial")
            ->join(
                "siswa",
                "hasil_rapat_sikap_spritual_sosial.nisn_siswa",
                "=",
                "siswa.nisn"
            )
            ->where("hasil_rapat_sikap_spritual_sosial.id_tahun_ajaran", $id)
            ->where(
                "hasil_rapat_sikap_spritual_sosial.id_kelas",
                $kelas->id_kelas
            )
            ->get();
        return view("raport.hasil_rapat_sikap", [
            "hasil" => $hasil,
            "no" => 1,
            "ta" => $ta,
            "kelas" => $kelas,
            "tha" => $tha,
        ]);
    }

    public function tambah_data_hasil_rapat_sikap(Request $request)
    {
        $siswa = Siswa::where("id_kelas", $request->id_kelas)->get();

        foreach ($siswa as $item) {
            DB::table("hasil_rapat_sikap_spritual_sosial")->insert([
                "id_kelas" => $request->id_kelas,
                "id_tahun_ajaran" => $request->id_tahun_ajaran,
                "nisn_siswa" => $item->nisn,
                "hasil_rapat" => "-",
            ]);
        }

        return redirect()
            ->back()
            ->with(
                "success",
                "Data Berhasil disimpan, silahkan edit hasil rapat masing-masing siswa"
            );
    }

    public function update_hasil_rapat_sikap(Request $request, $id)
    {
        $tes = DB::table("hasil_rapat_sikap_spritual_sosial")
            ->where("id_hasil", $id)
            ->update(["hasil_rapat" => $request->hasil_rapat]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil diupdate");
    }

    // kehadiran

    public function data_kehadiran_siswa()
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $tha = TahunAjaran::where("status", 2)->first();
        $ta = TahunAjaran::all();
        $kehadiran = DB::table("kehadiran")
            ->join("siswa", "kehadiran.nisn_siswa", "=", "siswa.nisn")
            ->where("id_tahun_ajaran", $tha->id_ta)
            ->where("kehadiran.id_kelas", $kelas->id_kelas)
            ->get();
        return view("raport.kehadiran.kehadiran_siswa", [
            "ta" => $ta,
            "tha" => $tha,
            "kehadiran" => $kehadiran,
            "kelas" => $kelas,
            "no" => 1,
        ]);
    }

    public function data_kehadiran_siswa_show($id)
    {
        $ta = TahunAjaran::all();
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $tha = TahunAjaran::findorfail($id);
        $kehadiran = DB::table("kehadiran")
            ->join("siswa", "kehadiran.nisn_siswa", "=", "siswa.nisn")
            ->where("id_tahun_ajaran", $tha->id_ta)
            ->where("kehadiran.id_kelas", $kelas->id_kelas)
            ->get();
        return view("raport.kehadiran.kehadiran_siswa", [
            "ta" => $ta,
            "tha" => $tha,
            "kehadiran" => $kehadiran,
            "kelas" => $kelas,
            "no" => 1,
        ]);
    }

    public function set_data_kehadiran($id)
    {
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $siswa = Siswa::where("id_kelas", $kelas->id_kelas)->get();

        foreach ($siswa as $item) {
            Kehadiran::create([
                "id_kelas" => $kelas->id_kelas,
                "id_tahun_ajaran" => $id,
                "nisn_siswa" => $item->nisn,
                "sakit" => 0,
                "izin" => 0,
                "tk" => 0,
            ]);
        }

        return redirect()
            ->back()
            ->with("success", "Data Kehadiran berhasil di set");
    }

    public function update_kehadiran(Request $request, $id)
    {
        Kehadiran::where("id_kehadiran", $id)->update([
            "sakit" => $request->sakit,
            "izin" => $request->izin,
            "tk" => $request->tk,
        ]);
        return redirect()
            ->back()
            ->with("success", "Data Berhasil diupdate");
    }

    public function cetak_raport(Request $request)
    {
        $tha = TahunAjaran::all();
        $guru = Guru::where("id_user", Auth::user()->id)->first();
        $kelasId = $request->kelas_id;

        if (!$guru) {
            if ($kelasId) {
                $kelas = Kelas::where("id_kelas", $kelasId)->firstOrFail();
                $siswa = Siswa::where("id_kelas", $kelas->id_kelas)->get();

                return view("raport.cetak.pilih", [
                    "kelas" => $kelas,
                    "siswa" => $siswa,
                    "tha" => $tha,
                ]);
            } else {
                $kelas = Kelas::all();
                $siswa = Siswa::all();

                return view("raport.cetak.pilih_kelas", ["kelas" => $kelas]);
            }
        } else {
            $kelas = DB::table("kelas")
                ->where("id_wali", $guru->id_guru)
                ->first();
            $siswa = Siswa::where("id_kelas", $kelas->id_kelas)->get();

            return view("raport.cetak.pilih", [
                "kelas" => $kelas,
                "siswa" => $siswa,
                "tha" => $tha,
            ]);
        }
    }

    public function print_raport(Request $request)
    {
        $sekolah = DB::table("data_sekolah")->first();
        $siswa = Siswa::where("nisn", $request->nisn_siswa)->first();
        $guru = Guru::where("id_guru", $request->id_guru)->first();

        $kelas = DB::table("kelas")
            ->where("id_wali", $guru->id_guru)
            ->first();
        $tha = TahunAjaran::findorfail($request->id_tahun_ajaran);
        $kepsek = User::where("level", 2)->first();

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
                ->where("nisn_siswa", $request->nisn_siswa)
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
                ->where("nisn_siswa", $request->nisn_siswa)
                ->get();

            $kehadiran = DB::table("kehadiran")
                ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                ->where("nisn_siswa", $request->nisn_siswa)
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
                ->where("nisn_siswa", $request->nisn_siswa)
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
                ->where("nisn_siswa", $request->nisn_siswa)
                ->get();

            $kehadiran = DB::table("kehadiran")
                ->where("id_tahun_ajaran", $request->id_tahun_ajaran)
                ->where("nisn_siswa", $request->nisn_siswa)
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
