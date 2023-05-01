<?php

namespace App\Http\Controllers\Api;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MapelResource;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();

        return new MapelResource(true, "Data Mata Pelajaran", $mapel);
    }

    public function store(Request $request)
    {
        $mapel = Mapel::create([
            "nama_mapel" => $request->nama_mapel,
        ]);

        return new MapelResource(
            true,
            "Data Mapel Berhasil Ditambahkan!",
            $mapel
        );
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::findorfail($id);

        $mapel->nama_mapel = $request->nama_mapel;

        $mapel->save();

        return new MapelResource(true, "Data Mapel Berhasil Diupdate!", $mapel);
    }

    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);

        $mapel->delete();

        return new MapelResource(true, "Data Mapel dihapus", $mapel);
    }
}
