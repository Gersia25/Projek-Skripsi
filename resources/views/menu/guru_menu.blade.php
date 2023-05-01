<li class="header">MENU GURU MAPEL</li> 
<li>
    <a href="{{ url('/data-nilai') }}">
      <i class="fa fa-table"></i> <span>Data Nilai Mapel</span>
    </a>
</li>
<li>
  <a href="{{ url('/data-nilai-extra') }}">
    <i class="fa fa-table"></i> <span>Data Nilai Extrakulikuler</span>
  </a>
</li>

<li class="header">MENU WALI KELAS</li>  
<li>
    <a href="{{ url('/cetak-blanko') }}">
      <i class="fa fa-print"></i> <span>Cetak Blanko Absensi</span>
    </a>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-book"></i>
    <span>Raport</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('data-kehadiran-siswa') }}"><i class="fa fa-circle-o"></i> Kehadiran Siswa</a></li>
    <li><a href="{{ url('cetak-raport') }}"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
  </ul>
</li>

<li>
  <a href="{{ url('/naik-kelas') }}">
    <i class="fa fa-arrow-up"></i> <span>Naik Kelas Siswa</span>
  </a>
</li>

<li class="header">Setting</li>  

<li>
  <a href="{{ url('data-user/'.Auth::user()->id) }}">
    <i class="fa fa-gear"></i> <span>Akun</span>
  </a>
</li>
