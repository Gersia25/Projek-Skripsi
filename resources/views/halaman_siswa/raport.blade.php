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
                <form action="{{ url('print-raport-saya') }}" method="POST">
                    @csrf
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