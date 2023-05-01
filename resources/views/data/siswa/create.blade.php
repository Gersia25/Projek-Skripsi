@extends('layouts.app')

@section('title')
    Tambah Data Siswa
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Data Siswa</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-siswa') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input placeholder="Masukan Nama Siswa" type="text" required class="form-control" name="nama_siswa">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option value="P">P</option>
                        <option value="L">L</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">NISN</label>
                    <input placeholder="Masukan NISN Siswa" type="text" value="" class="form-control" name="nisn">
                </div>
                <div class="form-group">
                    <label for="">Tingkatan</label>
                    <select name="tingkatan" class="form-control" id="">
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" class="form-control" id="">
                        <option value="0" selected>Tidak Ada</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}">{{ $item->kode_kelas }}</option>
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
                    <a href="{{ url('data-siswa') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
