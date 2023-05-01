@extends('layouts.app')

@section('title')
Cetak Blanko Absensi
@endsection

@section('content')

<div class="row">
  <div class="col-lg-4">
    <div class="alert bg-info">
      <p>Silahkan pilih kelas untuk cetak blanko absensi</p>
    </div>
  </div>
</div>
<div class="row">
  @forelse ($kelas as $item)
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $item->kode_kelas }}</h3>

          <p></p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="{{ url('print-blanko/'.$item->id_kelas) }}" class="small-box-footer">Cetak <i class="fa fa-print"></i></a>
      </div>
    </div>
    <!-- ./col -->
    @empty
    <div class="col-lg-6">
      <div class="alert alert-danger">
        <p>Maaf! anda tidak bisa mencetak blanko Absensi karna Anda bukan wali Kelas dari kelas manapun!</p>
        <p>* Silahkan hubungi operator/admin bahwa anda adalah wali kelas</p>
      </div>
    </div>   
</div>
@endforelse


@endsection