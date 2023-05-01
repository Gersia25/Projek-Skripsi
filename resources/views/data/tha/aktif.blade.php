<div class="modal fade" id="modal-update{{ $item->id_ta }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <form action="{{ url('data-tha/'.$item->id_ta) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <p>Yakin untuk mengaktifkan tahun ajaran {{ $item->semester }} - {{ $item->tahun_ajaran }}?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Aktifkan</button>
              </div>
        </form>
      </div>
    </div>
</div>