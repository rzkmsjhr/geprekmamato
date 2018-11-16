<div class="alert alert-success" id="notifupdatepromo" style="display:none">
    <span><b>Promo Berhasil Di Update</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Update Promo</h4>
    </div>
    <div class="content">
        <?php foreach($promo as $row){ ?>
        <form id="update-promo">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Promo</label>
                        <input type="hidden"name="id_promo" value="<?php echo $row->id_promo ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Promo" name="nama_promo" required value="<?php echo $row->nama_promo ?>">
                    </div>
                    <div class="form-group">
                        <label>Nilai Promo</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nilai promo" name="nilai_promo" required value="<?php echo $row->nilai_promo ?>">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea required name="keterangan" class="form-control"><?php echo $row->keterangan ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/promo'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>