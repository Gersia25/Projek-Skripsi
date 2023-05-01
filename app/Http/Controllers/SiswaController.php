<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Request $request)
    {
        $siswa = Siswa::leftjoin(
            "kelas",
            "siswa.id_kelas",
            "=",
            "kelas.id_kelas"
        )->get();
        return view("data.siswa.read", ["siswa" => $siswa, "no" => 1]);
    }

    public function show($id)
    {
        $siswa = Siswa::leftjoin(
            "kelas",
            "siswa.id_kelas",
            "=",
            "kelas.id_kelas"
        )
            ->where("siswa.tingkatan", $id)
            ->get();
        return view("data.siswa.read", ["siswa" => $siswa, "no" => 1]);
    }

    public function create()
    {
        $kelas = Kelas::all();

        return view("data.siswa.create", ["kelas" => $kelas]);
    }

    public function store(Request $request)
    {
        $id = rand(900, 100);
        Siswa::create([
            "nisn" => $request->nisn,
            "nama_siswa" => $request->nama_siswa,
            "jk" => $request->jk,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon,
            "id_kelas" => $request->id_kelas,
            "tingkatan" => $request->tingkatan,
            "id_user" => $id,
        ]);

        User::create([
            "id" => $id,
            "name" => $request->nama_siswa,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => 3,
        ]);

        return redirect("data-siswa")->with(
            "success",
            "Data siswa berhasil disimpan"
        );
    }

    public function edit(Request $request, $id)
    {
        $siswa = Siswa::leftjoin(
            "kelas",
            "siswa.id_kelas",
            "=",
            "kelas.id_kelas"
        )->findorfail($id);

        $kelas = Kelas::all();

        return view("data.siswa.edit", ["siswa" => $siswa, "kelas" => $kelas]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::leftjoin(
            "kelas",
            "siswa.id_kelas",
            "=",
            "kelas.id_kelas"
        )->findorfail($id);
        $user = User::findorfail($siswa->id_user);

        if ($request->password == true) {
            $siswa->nisn = $request->nisn;
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->telepon = $request->telepon;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->tingkatan = $request->tingkatan;

            $user->name = $request->nama_siswa;
            $user->email = $request->email;
            $user->password = $request->password;
        } else {
            $siswa->nisn = $request->nisn;
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->telepon = $request->telepon;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->tingkatan = $request->tingkatan;

            $user->name = $request->nama_siswa;
            $user->email = $request->email;
        }

        $siswa->save();
        $user->save();

        return redirect("data-siswa")->with(
            "success",
            "Data siswa berhasil diupdate"
        );
    }

    public function destroy($id)
    {
        $siswa = Siswa::findorfail($id);
        $user = User::findorfail($siswa->id_user);

        $siswa->delete();
        $user->delete();

        return redirect("data-siswa")->with(
            "delete",
            "Data siswa berhasil dihapus"
        );
    }
}
