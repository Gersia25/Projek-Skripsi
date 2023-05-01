@extends('layouts.app')

@section('title')
    Edit Data Kepala Sekolah
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Edit Data Kepala Sekolah</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-kepsek/'.encrypt($data->id)) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Kode/NIP</label>
                    <input value="{{ $data->kd }}" placeholder="Masukan Nama" type="text" value="0" class="form-control" name="kd">
                </div>
                <div class="form-group">
                    <label for="">Nama Kepala Sekolah</label>
                    <input value="{{ $data->name }}" placeholder="Masukan Nama" type="text" required class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">NIP Kepala Sekolah</label>
                    <input value="{{ $data->nip }}" placeholder="Masukan NIP" type="text" required class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input value="{{ $data->alamat }}" placeholder="Masukan Alamat" type="text" required class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input value="{{ $data->telepon }}" placeholder="Masukan Telepon" type="text" required class="form-control" name="telepon">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input value="{{ $data->email }}" placeholder="Masukan Email" readonly type="text" required class="form-control" name="email">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input placeholder="Masukan Password Baru" type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('data-kepsek') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
