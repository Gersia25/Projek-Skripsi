@include('layouts/header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>APP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Aplikasi</b> Raport</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="nav navbar-nav">
                <a href="">{{ Auth::user()->name }} (as @if (Auth::user()->level==1)
                    Admin
                @elseif(Auth::user()->level==3)
                    Guru
                @elseif(Auth::user()->level==4)
                    Siswa
                @endif)</a>
            </li>
          <!-- User Account: style can be found in dropdown.less -->
              <li class="nav navbar-nav">
                   
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                         <i class="fa fa-sign-out"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                
              </li>
            
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>        
        <li>
          <a href="{{ url('/home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        @if (Auth::user()->level==1)
            @include('menu.admin_menu')
        @elseif(Auth::user()->level==3)
            @include('menu.guru_menu')
        @elseif(Auth::user()->level==4)
            @include('menu.siswa_menu')
        @else
        @include('menu.kepsek_menu')
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aplikasi Raport
        <small>@yield('title')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

@include('layouts/footer')
