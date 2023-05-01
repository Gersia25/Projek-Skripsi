<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Format Raport</title>
<style>
        /* Pengaturan border-collapse jenis,ukuran serta warna huruf secara keseluruhan tabel */
    .table{
    border-collapse:collapse;
    font:normal normal 12px Verdana,Arial,Sans-Serif;
    color:#333333;
    }
    /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
    .table th {
    background:#bbbb;
    color: black;
    font-weight:bold;
    font-size:10px;
    }
    /* Mengatur border dan jarak/ruang pada kolom */
    .table th,
    .table td {
    vertical-align:top;
    padding:5px 10px;
    border:1px solid #696969;
    }
    /* Mengatur warna baris */
    .table tr {
    background:#F5FFFA;
    }
    /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
    .table tr:nth-child(even) {
    background:#F0F8FF;
    }
    .table-2 th,
    .table-2 td{
        font-weight: bold;
        font-size:12px;
    }
    .wrapper{
        width: 100%;
    }
    .bg-1{
        float: left;
        width: 50%;
    }
    .bg-2{
        float: right;
        width: 50%;
    }
</style>
</head>
<body style="margin: auto;width:100%;">
    <div class="wrapper">
        <div class="bg-1">
            <table class="table-2">
                <tr>
                    <td>Nama Peserta Didik</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sekolah</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>
        {{--  --}}
        <div class="bg-2">
            <table class="table-2">
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fase</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td>2 (Genap)</td>
                </tr>
                <tr>
                    <td>Tahun Pelajaran</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <table class="table" style="width: 100%; margin-top:70px;">
        <thead>
            <tr>
                <th style="width: 25px">No</th>
                <th>Mata Pelajaran</th>
                <th style="width: 10px">Nilai Akhir</th>
                <th style="width: 300px">Capaian Kompetensi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($mapel as $item)
            
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama_mapel }}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <table class="table" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 25px">No</th>
                <th>Extrakulikuler</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($extra as $item)
            <tr>
                <td>{{ $no2++ }}</td>
                <td>{{ $item->nama_mapel }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <br>
    <div class="wrapper">
        <table class="table" style="width: 40%;float:left">
            <thead>
                <tr>
                    <th colspan="2">Ketidakhadiran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sakit</td>
                    <td>......Hari</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td>......Hari</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td>......Hari</td>
                </tr>
            </tbody>
        </table>
        <div style="width: 40%;border:1px solid black;float:right;font-size:10px;padding:10px;">
            <p><b>Keputusan:</b></p>
            <p>Berdasarkan hasil yang dicapai pada semester 1 dan 2, peserta didik ditetapkan <br>
            naik ke kelas ________ (______________) <br>
            tinggal di kelas ________ (______________)</p>

            <p>_______________, {{ date('d/m/Y') }}</p>
            <p><b>TTD Kepala Sekolah</b></p><br><br>
            <p>_____________________________ <br> NIP:</p>
        </div>
    </div>
    <table class="table-2" style="margin-top: 250px;width:100%">
        <tr>
            <th>TTD Orang Tua Peserta Didik</th>
            <th>TTD Wali Kelas</th>
        </tr>
        <tr>
            <th style="padding-top:80px;">__________________________</th>
            <th style="padding-top:80px;">__________________________<br>NIP:</th>
        </tr>
    </table>
</body>
</html>