<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nilai Extrakulikuler</h4>
        </div>
        <form action="" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-body">    
              <input type="text" id="id_kelas" hidden>    
              <input type="text" id="id_guru" hidden>    
              <input type="text" id="id_mapel" hidden>    
              
              <div class="form-group">
                <select name="" class="form-control" id="id_tahun_ajaran">
                    <option value="0">Pilih Tahun Ajaran</option>
                    @foreach ($ta as $item)
                        <option value="{{ $item->id_ta }}">
                        @if ($item->semester==1)
                            1 (Satu)
                        @else
                            2 (Dua)
                        @endif {{ $item->tahun_ajaran }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <select name="" id="nisn_siswa" class="form-control">
                    @foreach ($siswa as $item)
                        <option value="{{ $item->nisn }}">{{ $item->nama_siswa }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">Capaian Kompetensi</label>
                <textarea name="" class="form-control" id="ket" cols="30" rows="10" placeholder="Masukan Keterangan"></textarea>
              </div>
            </div>
              <div class="modal-footer">
                <button type="button" id="simpan_nilai_extra" class="btn btn-primary">Simpan</button>
              </div>
        </form>
      </div>
    </div>
</div>