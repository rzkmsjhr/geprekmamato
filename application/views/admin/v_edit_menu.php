<div class="card">
    <div class="header">
        <h4 class="title">Update Menu</h4>
    </div>
    <div class="content">
        <?php foreach($menu as $row){ ?>
        <form id="update-menu">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="hidden" name="id_menu" value="<?php echo $row->id_menu ?>">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Menu" name="nama_menu" required="required" value="<?php echo $row->nama_menu ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_menu" required="required" value="<?php echo $row->harga_menu ?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select required="required" name="id_kategori_menu" class="form-control">
                            <?php foreach ($kategori as $cat) { ?>
                            <option 
                            <?php if($cat->id_kategori == $row->id_kategori_menu){ echo 'selected="selected"'; } ?> value="<?php echo $cat->id_kategori ?>">
                            <?php echo $cat->nama_kategori ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/menu'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>