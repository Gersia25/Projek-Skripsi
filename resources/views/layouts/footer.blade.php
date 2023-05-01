<!-- jQuery 3 -->
<script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{ asset('template') }}/bower_components/raphael/raphael.min.js"></script>
<script src="{{ asset('template') }}/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('template') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('template') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('template') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('template') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('template') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ asset('template') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('template') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('template') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('template') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('template') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template') }}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template') }}/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      scrollX       : true,
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      scrollX       : true
    })
  })
</script>
{{-- kelola nilai format kurikulum merdeka --}}
<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    // filter nilai
    $('#pilih_tha').click(function(){
      var id_tahun_ajaran = $('#pilih_ta').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();
      
      
      $.ajax({
        url:'get-nilai',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
        dataType: 'json',
          success: function(response){
            createRows(response);
        }
      });
    });

    // input nilai
    $('#btn_input_nilai').click(function(){
      var id_tahun_ajaran = $('#tahun_ajaran').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();

      $.ajax({
        url:'input-nilai',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
        dataType: 'json',
          success: function(response){
            alertSuccess(response);
        }
      });
    });
  });

  // edit nilai
  

  function alertSuccess(response){
    if (response == 'berhasil') {
      $('#alert_success').html('<div class="alert bg-success">Nilai berhasil di inputkan secara default! silahkan cari nilai untuk melakukan perubahan</div>');
    }
    if(response=='gagal'){
      $('#alert_success').html('<div class="alert bg-danger">Nilai gagal di inputkan! nilai sudah diinputkan silahkan pilih tahun ajaran yang lain</div>');
    }
  }

  function createRows(response){
      var len = 0;
      $('#example1 tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }

      if(len>0){
        for(var i=0; i<len;i++){
          var nisn_siswa = response['data'][i].nisn_siswa;
          var nilai_akhir = response['data'][i].nilai_akhir;
          var nama_siswa = response['data'][i].nama_siswa;
          var capaian = response['data'][i].capaian;

          var tr_str = "<tr>" +
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='left'>" + nisn_siswa + "</td>" +
             "<td align='left'>" + nama_siswa + "</td>" +
             "<td align='center'>" + nilai_akhir + "</td>" +
             "<td align='left'>" + capaian + "</td>" +
             "<td align='left'><a href='javascript:void(0)' type='button' onclick='return editNilai("+nisn_siswa+")' class='btn btn-primary'> Edit</a></td>" +
           "</tr>";

          
          $("#example1 tbody").append(tr_str);
        }
      }
    }

  function editNilai(nisn_siswa){
    $('#nisn_siswa').val(nisn_siswa);
    var id_kelas = $('#id_kelas').val();
    var id_guru = $('#id_guru').val();
    var id_mapel = $('#id_mapel').val();
    var id_tahun_ajaran = $('#pilih_ta').val();
    $('#id_kelas_a').val(id_kelas);
    $('#id_guru_a').val(id_guru);
    $('#id_mapel_a').val(id_mapel);
    $('#id_tahun_ajaran_a').val(id_tahun_ajaran);
    $('#edit-nilai').modal('show');
  }

  $('#update_nilai').click(function(){
    var id_kelas = $('#id_kelas_a').val();
    var id_guru = $('#id_guru_a').val();
    var id_mapel = $('#id_mapel_a').val();
    var id_tahun_ajaran = $('#id_tahun_ajaran_a').val();
    var nisn_siswa = $('#nisn_siswa').val();
    var nilai_akhir = $('#nilai_akhir').val();
    var capaian = $('#capaian').val();
    
    
    $.ajax({
        url:'update-nilai',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel,nisn_siswa:nisn_siswa,nilai_akhir:nilai_akhir,capaian:capaian},
        dataType: 'json',
  
          success: function(){
            $('#edit-nilai').modal('hide');
            $('#pilih_tha').click();

        }
    })
  })
</script>

{{-- kelola nilai format k13 --}}
<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $('#pilih_tha_2').click(function(){
      var id_tahun_ajaran = $('#pilih_ta_2').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();

      $.ajax({
        url:'get-nilai',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
        dataType: 'json',
          success: function(response){
            createRows2(response);
        }
      });
    });

    // input nilai
    $('#btn_input_nilai_2').click(function(){
      var id_tahun_ajaran = $('#tahun_ajaran').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();

      $.ajax({
        url:'input-nilai',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
        dataType: 'json',
          success: function(response){
            alertSuccess(response);
        }
      });
    });
  });

  function createRows2(response){
      var len = 0;
      $('#example1 tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }

      if(len>0){
        for(var i=0; i<len;i++){
          var nisn_siswa = response['data'][i].nisn_siswa;
          var nama_siswa = response['data'][i].nama_siswa;
          var nilai_peng = response['data'][i].nilai_peng;
          var nilai_prak = response['data'][i].nilai_prak;
          var nilai_sikap = response['data'][i].nilai_sikap;
          var des_peng = response['data'][i].des_peng;
          var des_prak = response['data'][i].des_prak;
          var des_sikap = response['data'][i].des_sikap;

          var tr_str = "<tr>" +
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='left'>" + nisn_siswa + "</td>" +
             "<td align='left'>" + nama_siswa + "</td>" +
             "<td align='left'>" + nilai_peng + "</td>" +
             "<td align='left'>" + nilai_prak + "</td>" +
             "<td align='left'>" + nilai_sikap + "</td>" +
             "<td align='left'>" + des_peng + "</td>" +
             "<td align='left'>" + des_prak + "</td>" +
             "<td align='left'>" + des_sikap + "</td>" +
             "<td align='left'><a href='javascript:void(0)' type='button' onclick='return editNilai2("+nisn_siswa+")' class='btn btn-primary'> Edit</a></td>" +
           "</tr>";

          
          $("#example1 tbody").append(tr_str);
        }
      }
    }
    // edit nilai
    function editNilai2(nisn_siswa){
    $('#nisn_siswa').val(nisn_siswa);
    var id_kelas = $('#id_kelas').val();
    var id_guru = $('#id_guru').val();
    var id_mapel = $('#id_mapel').val();
    var id_tahun_ajaran = $('#pilih_ta_2').val();
    $('#id_kelas_a').val(id_kelas);
    $('#id_guru_a').val(id_guru);
    $('#id_mapel_a').val(id_mapel);
    $('#id_tahun_ajaran_a').val(id_tahun_ajaran);
    $('#edit-nilai2').modal('show');
  }

  $('#update_nilai2').click(function(){
    var id_kelas = $('#id_kelas_a').val();
    var id_guru = $('#id_guru_a').val();
    var id_mapel = $('#id_mapel_a').val();
    var id_tahun_ajaran = $('#id_tahun_ajaran_a').val();
    var nisn_siswa = $('#nisn_siswa').val();
    var nilai_peng = $('#nilai_peng').val();
    var nilai_prak = $('#nilai_prak').val();
    var nilai_sikap = $('#nilai_sikap').val();
    var des_peng = $('#des_peng').val();
    var des_prak = $('#des_prak').val();
    var des_sikap = $('#des_sikap').val();
    
    
    $.ajax({
        url:'update-nilai',
        type:'post',
        data: {
          _token: CSRF_TOKEN,
          id_tahun_ajaran:id_tahun_ajaran,
          id_kelas:id_kelas,
          id_guru:id_guru,
          id_mapel:id_mapel,
          nisn_siswa:nisn_siswa,
          nilai_peng:nilai_peng,
          nilai_prak:nilai_prak,
          nilai_sikap:nilai_sikap,
          des_peng:des_peng,
          des_prak:des_prak,
          des_sikap:des_sikap
        },
        dataType: 'json',
  
          success: function(){
            $('#edit-nilai2').modal('hide');
            $('#pilih_tha_2').click();

        }
    })
  })
</script>

{{-- script nilai extrakulikuler merdeka--}}
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $('#pilih_tha_3').click(function(){
      var id_tahun_ajaran = $('#pilih_ta_3').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();

      $.ajax({
        url:'get-nilai-extra',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
        dataType: 'json',
          success: function(response){
            createRows3(response);
        }
      });
    });

    // input nilai
    $('#simpan_nilai_extra').click(function(){
      var id_tahun_ajaran = $('#id_tahun_ajaran').val();
      var id_kelas = $('#id_kelas').val();
      var id_guru = $('#id_guru').val();
      var id_mapel = $('#id_mapel').val();
      var nisn_siswa = $('#nisn_siswa').val();
      var ket = $('#ket').val();

  

      $.ajax({
        url:'input-nilai-extra',
        type:'post',
        data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel,nisn_siswa:nisn_siswa,ket:ket},
        dataType: 'json',
          success: function(response){
            $('#modal-create').modal('hide');
            $('#alert_success').html('<div class="alert bg-success">Nilai berhasil diinputkan, cari untuk melihat nilai</div>')
        }
      });
    });
  });

  function createRows3(response){
      var len = 0;
      $('#example1 tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }

      if(len>0){
        for(var i=0; i<len;i++){
          var id_nilai = response['data'][i].id_nilai;
          var nisn_siswa = response['data'][i].nisn_siswa;
          var nama_siswa = response['data'][i].nama_siswa;
          var ket = response['data'][i].ket;
      

          var tr_str = "<tr>" +
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='left'>" + nisn_siswa + "</td>" +
             "<td align='left'>" + nama_siswa + "</td>" +
             "<td align='left'>" + ket + "</td>" +
             "<td align='left'><a href='javascript:void(0)' type='button' onclick='return hapusNilaiExtra("+id_nilai+")' class='btn btn-danger'> Hapus</a></td>" +
           "</tr>";

          
          $("#example1 tbody").append(tr_str);
        }
      }
    }

    function hapusNilaiExtra(id_nilai){
        var id_nilai = id_nilai;
        $.ajax({
        url:'hapus-nilai-extra',
        type:'post',
        data: {_token: CSRF_TOKEN, id_nilai:id_nilai},
        dataType: 'json',
          success: function(response){
            $('#pilih_tha_3').click();
            $('#alert_success').html('<div class="alert bg-danger">Nilai berhasil dihapus</div>')
        }
      });
    }
</script>
{{-- extra 13 --}}
<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $('#pilih_tha_4').click(function(){
        var id_tahun_ajaran = $('#pilih_ta_4').val();
        var id_kelas = $('#id_kelas').val();
        var id_guru = $('#id_guru').val();
        var id_mapel = $('#id_mapel').val();
  
        $.ajax({
          url:'get-nilai-extra',
          type:'post',
          data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel},
          dataType: 'json',
            success: function(response){
              createRows4(response);
          }
        });
      });
  
      // input nilai
      $('#simpan_nilai_extra2').click(function(){
        var id_tahun_ajaran = $('#id_tahun_ajaran').val();
        var id_kelas = $('#id_kelas').val();
        var id_guru = $('#id_guru').val();
        var id_mapel = $('#id_mapel').val();
        var nisn_siswa = $('#nisn_siswa').val();
        var nilai = $('#nilai').val();
        var ket = $('#ket').val();
  
    
  
        $.ajax({
          url:'input-nilai-extra',
          type:'post',
          data: {_token: CSRF_TOKEN, id_tahun_ajaran:id_tahun_ajaran,id_kelas:id_kelas,id_guru:id_guru,id_mapel:id_mapel,nisn_siswa:nisn_siswa,nilai:nilai,ket:ket},
          dataType: 'json',
            success: function(response){
              $('#modal-create').modal('hide');
              $('#alert_success').html('<div class="alert bg-success">Nilai berhasil diinputkan, cari untuk melihat nilai</div>')
          }
        });
      });
    });
  
    function createRows4(response){
        var len = 0;
        $('#example1 tbody').empty(); // Empty <tbody>
        if(response['data'] != null){
           len = response['data'].length;
        }
  
        if(len>0){
          for(var i=0; i<len;i++){
            var id_nilai = response['data'][i].id_nilai;
            var nisn_siswa = response['data'][i].nisn_siswa;
            var nama_siswa = response['data'][i].nama_siswa;
            var nilai = response['data'][i].nilai;
            var ket = response['data'][i].ket;
        
  
            var tr_str = "<tr>" +
               "<td align='center'>" + (i+1) + "</td>" +
               "<td align='left'>" + nisn_siswa + "</td>" +
               "<td align='left'>" + nama_siswa + "</td>" +
               "<td align='left'>" + nilai + "</td>" +
               "<td align='left'>" + ket + "</td>" +
               "<td align='left'><a href='javascript:void(0)' type='button' onclick='return hapusNilaiExtra2("+id_nilai+")' class='btn btn-danger'> Hapus</a></td>" +
             "</tr>";
  
            
            $("#example1 tbody").append(tr_str);
          }
        }
      }
  
      function hapusNilaiExtra2(id_nilai){
          var id_nilai = id_nilai;
          $.ajax({
          url:'hapus-nilai-extra2',
          type:'post',
          data: {_token: CSRF_TOKEN, id_nilai:id_nilai},
          dataType: 'json',
            success: function(response){
              $('#pilih_tha_4').click();
              $('#alert_success').html('<div class="alert bg-danger">Nilai berhasil dihapus</div>')
          }
        });
      }
  </script>

<script>  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)    
$("#check-all").click(function(){ // Ketika user men-cek checkbox all      
  if($(this).is(":checked")) // Jika checkbox all diceklis        
  $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"      
  else  // Jika checkbox all tidak diceklis        
  $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"    
});        
$("#btn-delete").click(function(){ // Ketika user mengklik tombol delete      
  var confirm = window.confirm("Perhatian! setelah menaikan kelas, siswa tidak lagi berada pada tabel ini, apakah anda yakin untuk melakukannya?"); // Buat sebuah alert konfirmasi            
  if(confirm)  // Jika user mengklik tombol "Ok"        
  $("#form-delete").submit(); // Submit form    
});  
});  
</script>
</body>
</html>
