@extends('layouts.app')

@section('title')
    Tambah Data Admin
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Data Admin</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-admin') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="">Nama Admin</label>
                    <input placeholder="Masukan Nama" type="text" required class="form-control" name="name">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('data-admin') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
