<div class="card">
    <div class="header">
        <h4 class="title">Update Item Gudang</h4>
    </div>
    <div class="content">
        <?php foreach($gudang as $row){ ?>
        <form id="update-item">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden"name="id_item" value="<?php echo $row->id_item ?>">
                        <input type="hidden"name="kode_item" value="<?php echo $row->kode_item ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Item" name="nama_item" required value="<?php echo $row->nama_item ?>">
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Satuan" name="satuan" required value="<?php echo $row->satuan ?>">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" placeholder="Masukkan Stok" name="stok" required value="<?php echo $row->stok ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('gudang/mastergudang'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>