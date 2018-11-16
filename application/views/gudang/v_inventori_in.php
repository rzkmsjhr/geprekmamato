<div class="alert alert-success" id="notifitemin" style="display:none">
    <span><b>Item Masuk Berhasil Disimpan</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Input Inventori Masuk</h4>
    </div>
    <div class="content">
        <form id="submit-item-in">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Pilih Inventori</label>
                        <select required name="kode_item" class="form-control">
                              <?php 
                              foreach($inventori as $row)
                              { 
                                echo '<option value="'.$row->kode_item.'">'.$row->nama_item.'</option>';
                              }
                              ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Beli</label>
                        <input id="tanggal-beli" type="text" class="form-control" placeholder="Masukkan Tanggal Beli" name="tanggal_beli" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" placeholder="Masukkan Harga Beli" name="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nama Kategori" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea required name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('gudang/inventori'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>