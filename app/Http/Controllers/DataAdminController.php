<?php

namespace App\Http\Controllers;

use App\Models\DataAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $data_admin = DataAdmin::where("level", 1)->get();
        return view("data.admin.read", [
            "data_admin" => $data_admin,
            "no" => 1,
        ]);
    }

    public function create()
    {
        return view("data.admin.create");
    }

    public function store(Request $request)
    {
        DataAdmin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => 1,
        ]);

        return redirect()
            ->back()
            ->with("success", "Data Berhasil Disimpan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id_true = Crypt::decrypt($id);
        $data_admin = DataAdmin::findorfail($id_true);
        return view("data.admin.edit", ["data" => $data_admin]);
    }

    public function update(Request $request, $id)
    {
        $id_true = Crypt::decrypt($id);
        $data_admin = DataAdmin::findorfail($id_true);

        if ($request->password == true) {
            $data_admin->name = $request->name;
            $data_admin->email = $request->email;
            $data_admin->password = Hash::make($request->password);
        } else {
            $data_admin->name = $request->name;
            $data_admin->email = $request->email;
        }

        $data_admin->save();

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Update");
    }

    public function destroy($id)
    {
        $data_admin = DataAdmin::findorfail($id);

        $data_admin->delete();

        return redirect()
            ->back()
            ->with("delete", "Data Berhasil dihapus");
    }
}
