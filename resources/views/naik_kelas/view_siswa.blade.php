@extends('layouts.app')

@section('title')
    Daftar Siswa
@endsection

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Siswa</h3>
    </div>
    <div class="box-body">
        <form action="{{ url('naik-kelas') }}" id="form-delete" method="POST">
            @method('POST')
            @csrf
            <table id="example1" style="width: 100%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tingkatan</th>
                
                    </tr>
                </thead>
                <tbody>
                @foreach ($siswa as $item)
                    <tr>
                        <td><input type='checkbox' class='check-item' name='nisn[]' value="{{ $item->nisn }}"></td>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->tingkatan }}</td>
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <label for="">Pilih Kelas Tujuan</label>
                <select name="id_kelas" id="" class="form-control">
                    @foreach ($kelas as $item2)
                        <option value="{{ $item2->id_kelas }}">{{ $item2->kode_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="btn-delete">Naik Kelas</button>
        </form>
    </div>
</div>
@endsection
