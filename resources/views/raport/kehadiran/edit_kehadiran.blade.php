<div class="modal fade" id="edit-kehadiran{{ $item->id_kehadiran }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kehadiran</h4>
        </div>
        <form action="{{ url('update-kehadiran/'.$item->id_kehadiran) }}" method="POST">
            @method('POST')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">sakit</label>
                    <input name="sakit" type="text" value="{{ $item->sakit }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Izin</label>
                    <input name="izin" type="text" value="{{ $item->izin }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanpa Keterangan</label>
                    <input name="tk" value="{{ $item->tk }}" type="text" class="form-control">
                </div>
            </div>

           <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
           </div>
        </form>
      </div>
    </div>
</div>