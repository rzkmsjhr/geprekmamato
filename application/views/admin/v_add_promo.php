<div class="alert alert-success" id="notifpromo" style="display:none">
    <span><b>Promo Berhasil Disimpan</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Input Promo</h4>
    </div>
    <div class="content">
        <form id="submit-promo">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Promo</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Promo" name="nama_promo" required>
                    </div>
                    <div class="form-group">
                        <label>Nilai Promo</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nilai promo" name="nilai_promo" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea required="required" name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/promo'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>