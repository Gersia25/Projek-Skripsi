@extends('layouts.app')

@section('title')
    Tambah Data User
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Data User</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-user') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input placeholder="Masukan Nama" type="text" required class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input placeholder="Masukan Telepon" type="text" required class="form-control" name="telepon">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input placeholder="Masukan Email" type="text" required class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input placeholder="Masukan Password" required type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select name="level" id="" class="form-control">
                        <option value="1">Administator</option>
                        <option value="2">Kepala Sekolah</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('data-user') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
