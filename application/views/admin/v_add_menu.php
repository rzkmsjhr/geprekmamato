<div class="card">
    <div class="header">
        <h4 class="title">Input Menu</h4>
    </div>
    <div class="content">
        <form id="submit-menu">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Menu" name="nama_menu" required="required">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_menu" required="required">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select required="required" name="id_kategori_menu" class="form-control">
                            <?php 
                            foreach($kategori as $row)
                            { 
                              echo '<option value="'.$row->id_kategori.'">'.$row->nama_kategori.'</option>';
                            }
                            ?>
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
    </div>
</div>