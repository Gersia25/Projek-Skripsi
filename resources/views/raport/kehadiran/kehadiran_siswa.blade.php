@extends('layouts.app')

@section('title')
    Data Kehadiran Siswa
@endsection

@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Kehadiran Siswa Semester<b> {{ $tha->semester }} Tahun Ajaran {{ $tha->tahun_ajaran }} Kelas {{ $kelas->kode_kelas }}</b></h3>
                </div>
                <div class="box-header">
                    @foreach ($ta as $item)
                        
                    <a class="btn btn-danger" href="{{ url('data-kehadiran-siswa/'.$item->id_ta) }}"> Sem {{ $item->semester }} - {{ $item->tahun_ajaran }}</a>
                    @endforeach
                </div>
                <div class="box-header">
                    <a href="{{ url('set-data-kehadiran/'.$tha->id_ta) }}" onclick="return confirm('apakah anda ingin set data kehadiran?')" class="btn btn-primary">Set Data Kehadiran</a>
                </div>
                <div class="box-body">
                    <table id="example1" style="width: 100%" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Tanpa Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kehadiran as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nisn_siswa }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->sakit }}</td>
                                <td>{{ $item->izin }}</td>
                                <td>{{ $item->tk }}</td>
                                <td><a href="" data-toggle="modal" data-target="#edit-kehadiran{{ $item->id_kehadiran }}" class="btn btn-primary"> Edit</a></td>
                            </tr>
                            @include('raport.kehadiran.edit_kehadiran')
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection