<li>
    <a href="{{ url('/data-guru') }}">
      <i class="fa fa-users"></i> <span>Data Guru</span>
    </a>
  </li>
  
  <li>
    <a href="{{ url('/data-siswa') }}">
      <i class="fa fa-users"></i> <span>Data Siswa</span>
    </a>
  </li>
  <li>
      <a href="{{ url('/data-mapel') }}">
        <i class="fa fa-book"></i> <span>Mata Pelajaran</span>
      </a>
  </li>
  <li>
      <a href="{{ url('/data-kelas') }}">
        <i class="fa fa-table"></i> <span>Data Kelas</span>
      </a>
  </li>
  <li class="header">Setting</li>  
  <li>
    <a href="{{ url('data-user/'.Auth::user()->id) }}">
      <i class="fa fa-gear"></i> <span>Akun</span>
    </a>
  </li>