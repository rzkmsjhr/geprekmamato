<div class="card">
    <div class="header">
        <h4 class="title">Update Kategori Menu</h4>
    </div>
    <div class="content">
        <?php foreach($kategori_menu as $row){ ?>
        <form id="update-kategori">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden"name="id_kategori" value="<?php echo $row->id_kategori ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama_kategori" required="required" value="<?php echo $row->nama_kategori ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/kategori_menu'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>