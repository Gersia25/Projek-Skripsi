@extends('layouts.app')


@section('title')
    Data User
@endsection

@section('content')
@include('layouts.alert')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User</h3>
        </div>
        <div class="box-header">
          <a href="data-user/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($user as $item)
            
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  @if ($item->level==1)
                    <span class="badge bg-red">Administator</span>
                  @elseif($item->level==2)
                  <span class="badge bg-blue">Kepala Sekolah</span>
                  @elseif($item->level==3)
                  <span class="badge bg-yellow">Guru</span>
                  @elseif($item->level==4)
                  <span class="badge bg-green">Siswa</span>
             
                  
                  @else
                  @endif
                </td>
                <td>
                    <a href="" data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{ url('data-user/'.$item->id.'/edit') }}" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @include('data.user.delete')
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection