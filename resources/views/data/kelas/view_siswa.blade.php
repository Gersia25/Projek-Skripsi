@extends('layouts.app')


@section('title')
    Data Siswa
@endsection

@section('content')
@include('layouts.alert')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Siswa</h3>
        </div>
        <div class="box-header">
          <h3 class="box-title">Jumlah Siswa: {{ $siswa->count() }}</h3>
        </div>
        <div class="box-header">
            <a href="{{ url('data-kelas') }}" class="btn btn-danger">Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" style="width: 100%" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>NISN</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <!-- <th>Tingkatan</th> -->
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
           
            @foreach ($siswa as $item)
                
            <tr>
              <td>{{ $no++ }}</td>
                <td>{{ $item->nama_siswa }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->user->email }}</td>
                <!-- <td>{{ $item->tingkatan }}</td> -->
                <td>{{ $item->kelas->kode_kelas }}</td>
                <td>
                  <a href="" data-toggle="modal" data-target="#modal-hapus{{ $item->id_siswa }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  <a href="{{ url('data-siswa/'.$item->id_siswa.'/edit') }}" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                </td>
              </tr>
              @include('data.siswa.delete')
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection