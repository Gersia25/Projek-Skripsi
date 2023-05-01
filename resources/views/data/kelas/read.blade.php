@extends('layouts.app')


@section('title')
    Data Kelas
@endsection

@section('content')
@include('layouts.alert')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kelas</h3>
        </div>
        <div class="box-header">
          <form action="{{ url('data-kelas') }}" method="POST">
            @csrf
            @method('POST')
              <div class="form-group">
                <label for="">Tingkatan</label>
                <select name="tingkatan" class="form-control" id="">
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Kode Kelas</label>
                <input placeholder="Masukan Nama Mata Pelajaran" type="text" class="form-control" name="kode_kelas" required>
              </div>
              <div class="form-group">
                <label for="">Wali Kelas</label>
                <select name="id_wali" class="form-control" id="">
                  <option value="0">-Pilih Guru-</option>
                  @foreach ($guru as $item)
                      <option value="{{ $item->id_guru }}">{{ $item->nama_guru }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Tambah Kelas</button>
              </div>
          </form>
        </div>
        <div class="box-header">
          <a class="btn btn-success" href="{{ url('data-kelas') }}">All</a>
          <a class="btn btn-danger" href="{{ url('data-kelas/7') }}">Tingkatan 7</a>
          <a class="btn btn-danger" href="{{ url('data-kelas/8') }}">Tingkatan 8</a>
          <a class="btn btn-danger" href="{{ url('data-kelas/9') }}">Tingkatan 9</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Tingkatan</th>
              <th>Kode Kelas</th>
              <th>Wali Kelas</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
           
            
            @foreach ($kelas as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item->tingkatan }}</td>
              <td>{{ $item->kode_kelas }}</td>
              <td>{{ $item->guru->nama_guru }}</td>
              <td>
                  <a href="" data-toggle="modal" data-target="#modal-hapus{{ $item->id_kelas }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                  <a href="{{ url('lihat-siswa/'.$item->id_kelas) }}" class="btn btn-primary"> <i class="fa fa-eye"></i> Lihat Siswa</a>
              </td>
            </tr>
            @include('data.kelas.delete')
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection