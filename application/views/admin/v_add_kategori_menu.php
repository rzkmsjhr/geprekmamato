<div class="alert alert-success" id="notifkategori" style="display:none">
    <span><b>Kategori Menu Berhasil Disimpan</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Input Kategori Menu</h4>
    </div>
    <div class="content">
        <form id="submit-kategori">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                       
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama_kategori" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit" id="hide-submit-ketegori">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/kategori_menu'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>