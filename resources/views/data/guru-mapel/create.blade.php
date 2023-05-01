@extends('layouts.app')

@section('title')
    Tambah Data Guru
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Data Guru</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-guru') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="">Nama Guru</label>
                    <input placeholder="Masukan Nama" type="text" required class="form-control" name="nama_guru">
                </div>
                <div class="form-group">
                    <label for="">NIP Guru (Opsional)</label>
                    <input placeholder="Masukan NIP Guru" type="text" value="" class="form-control" name="nip">
                </div>
                <div class="form-group">
                    <label for="">Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control" id="">
                        <option value="0" selected>Tidak Ada</option>
                        @foreach ($mapel as $item)
                            <option value="{{ $item->id_mapel }}">{{ $item->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input placeholder="Masukan Alamat" type="text" required class="form-control" name="alamat">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('data-guru') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
