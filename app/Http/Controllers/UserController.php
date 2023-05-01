<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $user = User::all();
        return view("data.user.read", ["user" => $user, "no" => 1]);
    }

    public function create()
    {
        return view("data.user.create");
    }

    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "telepon" => $request->telepon,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level,
        ]);

        return redirect("data-user")->with("success", "Data Berhasil Disimpan");
    }

    public function edit($id)
    {
        $data_user = User::findorfail($id);
        return view("data.user.edit", ["data" => $data_user]);
    }

    public function update(Request $request, $id)
    {
        $data_admin = User::findorfail($id);

        if ($request->password == true) {
            $data_admin->name = $request->name;
            $data_admin->telepon = $request->telepon;
            $data_admin->email = $request->email;
            $data_admin->password = Hash::make($request->password);
        } else {
            $data_admin->name = $request->name;
            $data_admin->telepon = $request->telepon;
            $data_admin->email = $request->email;
        }

        $data_admin->save();

        return redirect()
            ->back()
            ->with("success", "Data Berhasil di Update");
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()
            ->back()
            ->with("delete", "Data Berhasil dihapus");
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view("data.user.edit", ["data" => $user]);
    }
}
