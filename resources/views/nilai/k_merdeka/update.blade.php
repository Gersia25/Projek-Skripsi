<div class="modal fade" id="edit-nilai">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Nilai Siswa</h4>
        </div>
        <form action="{{ url('update-nilai') }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-body">
              <input type="text" id="nisn_siswa" hidden>    
              <input type="text" id="id_kelas_a" hidden>    
              <input type="text" id="id_guru_a" hidden>    
              <input type="text" id="id_mapel_a" hidden>    
              <input type="text" id="id_tahun_ajaran_a" hidden>
              
              <div class="form-group">
                <label for="">Nilai Akhir</label>
                <input type="text" class="form-control" id="nilai_akhir" placeholder="Masukan Nilai Akhir">
              </div>
              <div class="form-group">
                <label for="">Capaian Kompetensi</label>
                <textarea name="" class="form-control" id="capaian" cols="30" rows="10" placeholder="Masukan capaian kompetensi"></textarea>
              </div>
            </div>
              <div class="modal-footer">
                <button type="button" id="update_nilai" class="btn btn-primary">Update</button>
              </div>
        </form>
      </div>
    </div>
</div>