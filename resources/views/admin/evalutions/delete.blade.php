<form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Apakah anda yakin ingin menghapus data {{ $evaluation->name }}?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelButton">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </div>
</form>
