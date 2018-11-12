<div class="card">
    <div class="header">
        <h4 class="title">Update Item Bahan Masakan Masuk</h4>
    </div>
    <div class="content">
        <?php foreach($gudang_in as $row){ ?>
        <form id="update-item-in">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="hidden"name="id_item_in" value="<?php echo $row->id_item_in ?>">
                        <label>Pilih Bahan Masakan</label>
                        <select required="required" name="kode_item" class="form-control">
                            <?php foreach ($bahanmasak as $bah) { ?>
                            <option 
                            <?php if($bah->kode_item == $row->kode_item){ echo 'selected="selected"'; } ?> value="<?php echo $row->kode_item ?>">
                            <?php echo $bah->nama_item ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Beli</label>
                        <input id="tanggal-beli" type="text" class="form-control" placeholder="Masukkan Tanggal Beli" name="tanggal_beli" required="required" value="<?php echo $row->tanggal_beli ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga Beli" name="harga_beli" required="required" value="<?php echo $row->harga_beli ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="jumlah" required="required" value="<?php echo $row->jumlah?>">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea required="required" name="keterangan" class="form-control"><?php echo $row->keterangan ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/bahanmasak'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
        <?php } ?>
    </div>
</div>