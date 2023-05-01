<li>
    <a href="{{ url('/raport-saya') }}">
      <i class="fa fa-print"></i> <span>Cetak Raport</span>
    </a>
</li>

<li class="header">Setting</li>  

<li>
  <a href="{{ url('data-user/'.Auth::user()->id) }}">
    <i class="fa fa-gear"></i> <span>Akun</span>
  </a>
</li>