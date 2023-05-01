@extends('layouts.app')

@section('title')
    Edit Data Siswa
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Edit Data Siswa</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-siswa',$siswa->id_siswa) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input value="{{ $siswa->nama_siswa }}" placeholder="Masukan Nama Siswa" type="text" required class="form-control" name="nama_siswa">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" id="">
                        <option selected value="{{ $siswa->jk }}">{{ $siswa->jk}}</option>
                        <option value="P">P</option>
                        <option value="L">L</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">NISN</label>
                    <input value="{{ $siswa->nisn }}" placeholder="Masukan NISN Siswa" type="text" value="" class="form-control" name="nisn">
                </div>
                <div class="form-group">
                    <label for="">Tingkatan</label>
                    <select name="tingkatan" class="form-control" id="">
                        <option selected value="{{ $siswa->tingkatan }}">{{ $siswa->tingkatan }}</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" class="form-control" id="">
                        <option value="{{ $siswa->id_kelas }}">{{ $siswa->kode_kelas }}</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}">{{ $item->kode_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input value="{{ $siswa->alamat }}" placeholder="Masukan Alamat" type="text" required class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input value="{{ $siswa->telepon }}" placeholder="Masukan Telepon" type="text" required class="form-control" name="telepon">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input placeholder="Masukan Email" value="{{ $siswa->user->email }}" type="text" required class="form-control" name="email">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input placeholder="Masukan Password Baru" type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('data-siswa') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
