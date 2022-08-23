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
                            <label for="nama_kendaraan" id="label_nama_aset" class="col-lg-2 col-lg-offset-2 control-label">Nama kendaraan</label>
                            <div class="col-lg-6">
                                <input type="text" name="nama_kendaraan" id="nama_kendaraan" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="nopol" id="label_nopol_aset" class="col-lg-2 col-lg-offset-1 control-label">Nomor Polisi</label>
                            <div class="col-lg-6">
                                <input type="text" name="nopol" id="nopol" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="jenis_aset" class="col-lg-2 col-lg-offset-1 control-label">Jenis Kendaraan</label>
                            <div class="col-lg-6">
                                <select name="jenis_aset" id="jenis_aset" class="form-control jenis_aset-row" required>
                                    <option value="">Jenis Kendaraan</option>
                                    <option value="Angkutan Barang">Angkutan Barang</option>
                                    <option value="Angkutan Orang">Angkutan Orang</option>
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="status_aset" class="col-lg-2 col-lg-offset-1 control-label">Status Kendaraan</label>
                            <div class="col-lg-6">
                                <select name="status_aset" id="status_aset" class="form-control status_aset-row" required>
                                    <option value="">Status Kendaraan</option>
                                    <option value="Sewa">Sewa</option>
                                    <option value="Milik Pribadi">Milik Pribadi</option>
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