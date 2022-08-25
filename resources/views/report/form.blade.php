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
                            <label for="pemohon" class="col-lg-2 col-lg-offset-1 control-label">Pemohon</label>
                            <div class="col-lg-6">
                            <input type="text" name="pemohon" id="pemohon" class="form-control datepicker"
                                    style="border-radius: 0 !important;">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="keperluan" class="col-lg-2 col-lg-offset-1 control-label">Keperluan</label>
                            <div class="col-lg-6">
                                <textarea name="keperluan" id="keperluan" rows="3" class="form-control"></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="kendaraan_id" class="col-lg-2 col-lg-offset-1 control-label">Kendaraan</label>
                            <div class="col-lg-6">
                                <select name="kendaraan_id" id="kendaraan_id" class="form-control" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach ($kendaraan as $item)
                                    <option value="{{ $item->id_kendaraan }}">{{ $item->nama_kendaraan }}  | |  {{ $item->nopol }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="driver_id" class="col-lg-2 col-lg-offset-1 control-label">Driver</label>
                            <div class="col-lg-6">
                                <select name="driver_id" id="driver_id" class="form-control" required>
                                    <option value="">Pilih Driver</option>
                                    @foreach ($driver as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
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