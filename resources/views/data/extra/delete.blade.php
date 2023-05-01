<div class="modal fade" id="modal-hapus{{ $item->id_extra }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <form action="{{ url('data-extra/'.$item->id_extra) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-body">
                <p>Yakin untuk menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Hapus</button>
              </div>
        </form>
      </div>
    </div>
</div>