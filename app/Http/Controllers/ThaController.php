<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $tha = TahunAjaran::orderBy("id_ta", "DESC")->get();
        return view("data.tha.read", ["tha" => $tha, "no" => 1]);
    }

    public function store(Request $request)
    {
        TahunAjaran::create([
            "semester" => $request->semester,
            "tahun_ajaran" => $request->tahun_ajaran,
            "status" => 1,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Simpan");
    }

    public function update($id)
    {
        $ta = TahunAjaran::findorfail($id);
        $ta->status = 2;
        $ta->save();

        $ta2 = DB::table("tahun_ajaran")
            ->where("id_ta", "!=", $id)
            ->update(["status" => 1]);

        return redirect()
            ->back()
            ->with("success", "Tahun ajaran telah dirubah");
    }

    public function destroy($id)
    {
        $tha = TahunAjaran::findorfail($id);
        $tha->delete();
        return redirect()
            ->back()
            ->with("delete", "Data Berhasil dihapus");
    }
}
