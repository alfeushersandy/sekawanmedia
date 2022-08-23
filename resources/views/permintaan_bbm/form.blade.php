<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tanggal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Pinjam</label>
                            <div class="col-lg-6">
                                <input type="date" value="{{ date('Y-m-d') }}" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control datepicker" required autofocus
                                    style="border-radius: 0 !important;">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="kendaraan_id" class="col-lg-2 col-lg-offset-1 control-label">Kode Permintaan</label>
                            <div class="col-lg-6">
                                <select name="id_permintaan" id="id_permintaan" class="form-control" required>
                                    <option value="">Pilih Kode Permintaan</option>
                                    @foreach ($permintaan as $item)
                                    <option value="{{ $item->id_permintaan }}">{{ $item->kode_permintaan }}  | |  {{ $item->pemohon }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="jumlah" class="col-lg-2 col-lg-offset-1 control-label">Jumlah dalam liter</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="jumlah">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
</div>