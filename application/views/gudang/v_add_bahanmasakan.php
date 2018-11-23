<div class="alert alert-success" id="notifgudang" style="display:none">
    <span><b>Data Gudang Berhasil Disimpan</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Input Bahan Masakan</h4>
    </div>
    <div class="content">
        <form id="submit-item">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Kode Bahan</label>
                        <input class="form-control" readonly="readonly" type="text" name="kode_item1" value="BHN">
                        <input type="text" class="form-control" placeholder="Masukkan Kode Item" name="kode_item2" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Bahan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Item" name="nama_item" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Satuan" name="satuan" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" placeholder="Masukkan Stok" name="stok" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit" id="hide-submit-item">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('gudang/mastergudang'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>