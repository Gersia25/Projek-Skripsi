<?php

namespace App\Http\Controllers;

use App\Models\DataKepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DataKepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $kepsek = DataKepsek::where("level", 2)->get();
        return view("data.kepsek.read", ["no" => 1, "kepsek" => $kepsek]);
    }

    public function create()
    {
        return view("data.kepsek.create");
    }

    public function store(Request $request)
    {
        DataKepsek::create([
            "kd" => $request->kd,
            "name" => $request->name,
            "nip" => $request->nip,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => 2,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Simpan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id_true = Crypt::decrypt($id);

        $kepsek = DataKepsek::findorfail($id_true);

        return view("data.kepsek.edit", ["data" => $kepsek]);
    }

    public function update(Request $request, $id)
    {
        $id_true = Crypt::decrypt($id);
        $kepsek = DataKepsek::findorfail($id_true);

        if ($request->password == true) {
            $kepsek->kd = $request->kd;
            $kepsek->name = $request->name;
            $kepsek->nip = $request->nip;
            $kepsek->alamat = $request->alamat;
            $kepsek->telepon = $request->telepon;
            $kepsek->email = $request->email;
            $kepsek->password = Hash::make($request->password);
        } else {
            $kepsek->kd = $request->kd;
            $kepsek->name = $request->name;
            $kepsek->nip = $request->nip;
            $kepsek->alamat = $request->alamat;
            $kepsek->telepon = $request->telepon;
            $kepsek->email = $request->email;
        }
        $kepsek->save();

        return redirect()
            ->back()
            ->with("success", "Berhasil di Update");
    }

    public function destroy($id)
    {
        $kepsek = DataKepsek::findorfail($id);

        $kepsek->delete();

        return redirect()
            ->back()
            ->with("delete", "Data Berhasil di Hapus");
    }
}