@extends('layouts.app')

@section('title')
    Cetak Raport Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Silahkan pilih siswa dan tahun ajaran dibawah ini</h3>
            </div>

            <div class="box-body">
                <form action="{{ url('print-raport') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_guru" value="{{ $kelas->id_wali }}" hidden>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input readonly class="form-control" type="text" value="{{ $kelas->kode_kelas }}">
                        <input type="text" name="tingkatan" value="{{ $kelas->tingkatan }}" hidden>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Siswa</label>
                        <select name="nisn_siswa" id="" class="form-control">
                            @foreach ($siswa as $item)
                                <option value="{{ $item->nisn }}">{{ $item->nama_siswa }} [{{ $item->nisn }}]</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <select name="id_tahun_ajaran" id="" class="form-control">
                            @foreach ($tha as $item)
                                <option value="{{ $item->id_ta }}">{{ $item->tahun_ajaran }} [{{ $item->semester }}]</option>                                
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection