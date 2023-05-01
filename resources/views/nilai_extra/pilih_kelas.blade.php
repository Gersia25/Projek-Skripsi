@extends('layouts.app')

@section('title')
    Data Nilai
@endsection

@section('content')
@if ($guru->mapel->type==1)
<div class="row">
  <div class="col-lg-4">
    <div class="alert bg-red">
      <p>Anda tidak bisa mengakses halaman ini, karna anda adalah guru Mata Pelajaran</p>
    </div>
  </div>
</div>
@else
<div class="row">
  <div class="col-lg-4">
    <div class="alert bg-green">
      <p>Silahkan pilih kelas untuk melihat dan menginputkan nilai Extrakulikuler</p>
    </div>
  </div>
</div>
<div class="row">
  @foreach ($kelas as $item)
@if ($item->tingkatan==7)
@php
 $bg = 'red';   
@endphp    

@elseif($item->tingkatan==8)
@php
$bg = 'green';
@endphp

@elseif($item->tingkatan==9)

@php
$bg = 'blue';
@endphp
@endif
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-{{ $bg }}">
        <div class="inner">
          <h3>{{ $item->kode_kelas }}</h3>

          <p>Tingkatan: {{ $item->tingkatan }}</p>
          <p>Wali Kelas: {{ $item->guru->nama_guru }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-star"></i>
        </div>
        <a href="{{ url('data-nilai-extra/'.$item->id_kelas) }}" class="small-box-footer">Lihat Nilai <i class="fa fa-eye"></i></a>
      </div>
    </div>
    <!-- ./col -->
    @endforeach
</div>
@endif

@endsection