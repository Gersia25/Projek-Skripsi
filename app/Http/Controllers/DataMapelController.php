<?php

namespace App\Http\Controllers;

use App\Http\Resources\MapelResource;
use App\Models\Mapel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataMapelController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Request $request)
    {
        $mapel = Mapel::all();
        return view("data.mapel.read", [
            "mapel" => $mapel,
            "no" => 1,
        ]);
    }

    public function store(Request $request)
    {
        Mapel::create([
            "nama_mapel" => $request->nama_mapel,
            "type" => $request->type,
            "kurikulum" => $request->kurikulum,
            "kelompok" => $request->kelompok,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Simpan");
    }

    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);

        $mapel->delete();

        return redirect()
            ->back()
            ->with("delete", "Data Berhasil dihapus");
    }
}
