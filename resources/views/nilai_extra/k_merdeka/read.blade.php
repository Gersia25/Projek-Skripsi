@extends('layouts.app')

@section('title')
    Data Nilai
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
      <div class="alert bg-green">
        <table style="width: 100%">
            <tr>
                <td>Format Nilai</td>
                <td>:</td>
                <td>Kurikulum Merdeka</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td> {{ $kelas->kode_kelas }}</td>
                <input type="text" hidden value="{{ $kelas->id_kelas }}" id="id_kelas">
                <input type="text" hidden value="{{ $guru_mapel->id_guru }}" id="id_guru">
                <input type="text" hidden value="{{ $guru_mapel->id_mapel }}" id="id_mapel">
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td>:</td>
                <td> {{ $kelas->guru->nama_guru }}</td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td> {{ $guru_mapel->mapel->nama_mapel }}</td>
            </tr>
            <tr>
                <td>Guru Extrakulikuler</td>
                <td>:</td>
                <td> {{ $guru_mapel->nama_guru }}</td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td>
                    <select name="" class="form-control" id="pilih_ta_3">
                        <option value="0">Pilih Tahun Ajaran</option>
                        @foreach ($ta as $item)
                            <option value="{{ $item->id_ta }}">
                            @if ($item->semester==1)
                                1 (Satu)
                            @else
                                2 (Dua)
                            @endif {{ $item->tahun_ajaran }}</option>
                        @endforeach
                    </select>
                    
                </td>
                <td><button type="button" id="pilih_tha_3" class="btn btn-danger">Cari</button></td>
            </tr>
        </table>
      </div>
    </div>
</div>
<div id="alert_success">

</div>
<div class="row">
    <div class="col-lg-4">
        <a href="{{ url('data-nilai') }}" class="btn btn-danger">Kembali</a>
        <a href="" data-toggle="modal" data-target="#modal-create" class="btn btn-primary">Input Nilai</a>
        @include('nilai_extra.k_merdeka.create')
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Nilai Extrakulikuler</h3>
        </div>
        
        <div class="box-body">
          <table id="example1" style="width: 100%" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>NISN Siswa</th>
              <th>Nama Siswa</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection