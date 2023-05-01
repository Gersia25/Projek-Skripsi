<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\ModelRaport;
use Illuminate\Http\Request;
use PDF;

class ModelRaportController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $format = ModelRaport::all();
        return view("format_raport.read", ["format" => $format, "no" => 1]);
    }

    public function format_raport_1($id)
    {
        $format = ModelRaport::findorfail($id);
        $mapel = Mapel::where([["type", 1], ["kurikulum", 2]])->get();
        $extra = Mapel::where("type", 2)->get();
        
        $pdf = PDF::loadView("format_raport.format-1.format-2", [
            "format" => $format,
            "mapel" => $mapel,
            "no" => 1,
            "extra" => $extra,
            "no2" => 1,
        ]);
        return $pdf->stream("kurikulum-merdeka-1.pdf");
    }

    public function format_raport_2($id)
    {
        $format = ModelRaport::findorfail($id);
        $mapel = Mapel::where([["type", 2], ["kurikulum", 2]])->get();
        $extra = Mapel::where("type", 2)->get();
        
        $pdf = PDF::loadView("format_raport.format-2.format-2", [
            "format" => $format,
            "mapel" => $mapel,
            "no" => 1,
            "extra" => $extra,
            "no2" => 1,
        ]);
        return $pdf->stream("kurikulum-merdeka-2.pdf");
    }
}
