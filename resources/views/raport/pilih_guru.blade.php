@extends('layouts.app')

@section('title')
Cetak Blanko Absensi
@endsection

@section('content')

<div class="row">
  <div class="col-lg-4">
    <div class="alert bg-info">
      <p>Silahkan pilih guru</p>
    </div>
  </div>
</div>
<div class="row">
  @forelse ($teachers as $item)
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <form class="small-box bg-aqua p-4" style="padding: .5rem" method="get" action="{{ url($action ?? "") }}">
        <button type="submit" hidden id="btn"></button>
        <label for="btn" class="">
          <div class="inner">
            <h3>{{ $item->nama_guru }}</h3>
            <p>NIP : {{ $item->nip ?? "-" }}</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
            <input type="hidden" value="{{ $item->id_user }}" name="teacher_id">
        </label>
      </form>
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