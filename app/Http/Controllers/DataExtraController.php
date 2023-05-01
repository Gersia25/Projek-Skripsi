<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use Illuminate\Http\Request;

class DataExtraController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $extra = Extra::all();
        return view("data.extra.read", ["extra" => $extra, "no" => 1]);
    }

    public function store(Request $request)
    {
        Extra::create([
            "nama_extra" => $request->nama_extra,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data berhasil disimpan");
    }

    public function destroy($id)
    {
        $extra = Extra::findorfail($id);

        $extra->delete();

        return redirect()
            ->back()
            ->with("delete", "Data berhasil dihapus");
    }
}
