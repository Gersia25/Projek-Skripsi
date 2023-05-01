@extends('layouts.app')

@section('title')
Home    
@endsection
@section('content')
<div class="alert alert-warning">
  <h3>Data Sekolah</h3>
  <table style="width: 40%">
    <tr>
      <td>NPSN</td>
      <td>:</td>
      <td><b>{{ $ds->npsn }}</b></td>
    </tr>
    <tr>
      <td>Nama Sekolah</td>
      <td>:</td>
      <td><b>{{ $ds->nama_sekolah }}</b></td>
    </tr>
    <tr>
      <td>Jenjang Pendidikan</td>
      <td>:</td>
      <td><b>{{ $ds->jenjang }}</b></td>
    </tr>
    <tr>
      <td>Akreditasi</td>
      <td>:</td>
      <td><b>{{ $ds->akreditasi }}</b></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><b>{{ $ds->alamat }}</b></td>
    </tr>
    <tr>
      <td>Kode Pos</td>
      <td>:</td>
      <td><b>{{ $ds->kode_pos }}</b></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td>:</td>
      <td><b>{{ $ds->telepon }}</b></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><b>{{ $ds->email }}</b></td>
    </tr>
  </table>
</div>
<div class="alert alert-success">
    <h3>Selamat Datang di Aplikasi Pencatatan dan Pencetakan Blanko Presensi</h3>
    <h4><b>Tahun Ajaran Sekarang ({{ $tha->semester }} - {{ $tha->tahun_ajaran }})</b></h4>
    <p>* Buka menu Tahun Ajaran untuk merubah tahun ajaran saat ini (Hanya admin yang dapat merubah)</p>
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $guru->count() }}</h3>

          <p>Jumlah Guru</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        @if (Auth::user()->level==1)
        <a href="{{ url('data-guru') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        @endif
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $siswa->count() }}</h3>

          <p>Jumlah Siswa</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        @if (Auth::user()->level==1)
        <a href="{{ url('data-siswa') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        @endif
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $kelas->count() }}</h3>

          <p>Jumlah Kelas</p>
        </div>
        <div class="icon">
          <i class="fa fa-star"></i>
        </div>
        @if (Auth::user()->level==1)
        <a href="{{ url('data-kelas') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        @endif
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $mapel->count() }}</h3>

          <p>Jumlah Mata Pelajaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-folder"></i>
        </div>
        @if (Auth::user()->level==1)
            
        <a href="{{ url('data-mapel') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        @endif
      </div>
    </div>
    <!-- ./col -->
  </div>

  @if (Auth::user()->level==3)
  <div class="row">
    <div class="col-lg-4">
      <div class="alert alert-danger">
        <h4>Informasi Guru:</h4>
        <p>Nama Guru: {{ $guru_login->nama_guru }}</p>
        <p>NIP: {{ $guru_login->nama_guru }}</p>
        <p>Mata Pelajaran: {{ $guru_login->nama_mapel }}</p>
        <p>Wali Kelas : {{ $guru_login->kode_kelas }}</p>
      </div>
    </div>
  </div>
  @endif

  
@endsection
