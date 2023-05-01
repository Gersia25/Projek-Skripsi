@extends('layouts.app')

@section('title')
    Data Sekolah
@endsection


@section('content')
@include('layouts.alert')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Sekolah</h3>
        </div>

        <div class="box-body">
            <form action="{{ url('data-sekolah/'.$ds->id_sekolah) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">NPSN</label>
                    <input type="text" value="{{ $ds->npsn }}" name="npsn" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Sekolah</label>
                    <input type="text" value="{{ $ds->nama_sekolah }}" name="nama_sekolah" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Akreditasi</label>
                    <input type="text" value="{{ $ds->akreditasi }}" name="akreditasi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" value="{{ $ds->alamat }}" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kode Pos</label>
                    <input type="text" value="{{ $ds->kode_pos }}" name="kode_pos" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" value="{{ $ds->telepon }}" name="telepon" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" value="{{ $ds->email }}" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenjang Pendidikan</label>
                    <input type="text" value="{{ $ds->jenjang }}" name="jenjang" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div> 
@endsection