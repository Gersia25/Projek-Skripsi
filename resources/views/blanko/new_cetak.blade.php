<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blanko Absensi</title>
    <style>
    * {
      padding: 0;
      margin: 0;
    }
    @page { 
        size: landscape;
    }
    body { 
        writing-mode: tb-rl;
    }
    body {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      width: 100%;
      height: 100%;
      align-items: center;
      overflow: scroll;
      padding: 2.5rem;
      /* 
      transform-origin: center top;
      transform: translate(100%, 100%) rotate(90deg);
      */
    }
        /* Pengaturan border-collapse jenis,ukuran serta warna huruf secara keseluruhan tabel */
    table{
        border-collapse:collapse;
        font:normal normal 1rem Verdana,Arial,Sans-Serif;
        color:#333333;
    }
    /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
    table th {
        background:#00BFFF;
        color:#DCDCDC;
        font-weight:bold;
    }
    /* Mengatur border dan jarak/ruang pada kolom */
    table th,
    table td {
        border: solid .1px #000;
    }
    
    table td {
      padding: .2rem .3rem;
      text-align: center;
    }
    /* Mengatur warna baris */
    table tr {
        background:#F5FFFA;
    }
    /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
    table tr:nth-child(even) {
        background:#F0F8FF;
    }
    .flex-row-center {
      display: flex;
      align-items: center;
      gap: .1rem;
    }
    .flex-row-start {
      display: flex;
      align-items: start;
      gap: .1rem;
    }
    .box {
      box-sizing: border-box;
      width: 1rem; 
      height: 1rem;
      display: flex;
      padding: 15rem !important;
      align-items: center;
      justify-content: center;
    }
    .subtitle p {
      text-transform: capitalize;
    }
    </style>
</head>
<body>
    <div style="text-align: center">
        <h3>BLANKO PRESENSI SISWA</h3>
    </div>
    <div style="text-align: center">
        <h3>Bulan {{ date("M") }} {{ date("Y") }}</h3>
    </div>
    
    <div class="subtitle" style="font-size: .8rem;font-weight: bold; width: 100%; 
    display: flex; gap: 2rem; flex-direction: row; justify-content: space-between; align-items: center;">
      <div class="flex-row-center" style="gap: .2rem">
        <p>Kelas        : {{ $kelas->kode_kelas }}</p> 
      </div>
      <div class="flex-row-center" style="gap: .2rem">
        <p>Wali Kelas   : {{ $kelas->guru->nama_guru }}</p>
      </div>
      
      <div class="flex-row-center" style="gap: .2rem">
        <p>Tahun Ajaran   : {{ $tp->tahun_ajaran }}</p>
      </div>
    </div>
    <br> <!-- Tambahkan baris ini untuk memberi spasi -->
    <table border=0 cellpadding="4">
     <tr>
      <td rowspan=2 height=42 class=xl71 style='height:31.5pt'>NO</td>
      <td rowspan=2>NISN</td>
      <td rowspan=2>NAMA</td>
      <td rowspan=2>L/P</td>
      <td style="text-align: center;" colspan={{ cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) }} >TANGGAL</td>
      <td colspan=3 class=xl73 style='border-right:.5pt solid black'>JUMLAH</td>
     </tr>
     <tr>
       @for($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); $i++)
        <td>{{ $i }}</td>
       @endfor
      <td>I</td>
      <td>S</td>
      <td>A</td>
     </tr>
     
     @php
       use Carbon\Carbon;
       $i = 1;
       $sakit = 0;
       $alfa = 0;
       $izin = 0;
       $masuk = 0;
     @endphp
     @foreach($siswa as $item)
       <tr>
         <td>{{ $i++ }}</td>
         <td>{{ $item->nisn }}</td>
         <td>{{ $item->nama_siswa }}</td>
         <td>{{ $item->jk }}</td>
           @for($j = 1; $j <= cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); $j++)
            <td>
              @if ($item->absensi)
                @foreach ($item->absensi as $absensi)
                  @php
                    $date = new Carbon($absensi->updated_at);
                  @endphp
                  @if((int) $date->format("d") === (int) $j)
                    @if ($absensi->sakit)
                      <?php $sakit++; ?>
                      {{ "S" }}
                    @elseif ($absensi->tk)
                      <?php $alfa++; ?>
                      {{ "A" }}
                    @elseif ($absensi->izin)
                      <?php $izin++; ?>
                      {{ "I" }}
                    @else
                      <?php $masuk++; ?>
                      {{ "." }}
                    @endif
                  @else
                    {{ "-" }}
                  @endif
                @endforeach
              </td>
             @endif
           @endfor
           <td>{{ $izin > 0 ? $izin : null }}</td>
           <td>{{ $sakit > 0 ? $sakit : null }}</td>
           <td>{{ $alfa > 0 ? $alfa : null }}</td>
         </tr>
     @endforeach
   </table>
</body>
</html>