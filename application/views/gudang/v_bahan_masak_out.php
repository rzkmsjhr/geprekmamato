<div class="alert alert-success" id="notifitemout" style="display:none">
    <span><b>Item Keluar Berhasil Disimpan</span>
</div>
<div class="card">
    <div class="header">
        <h4 class="title">Input Bahan Masakan Keluar</h4>
    </div>
    <div class="content">
        <form id="submit-item-out">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Pilih Bahan Masakan</label>
                        <select required name="kode_item" class="form-control">
                              <?php 
                              foreach($bahanmasak as $row)
                              { 
                                echo '<option value="'.$row->kode_item.'">'.$row->nama_item.'</option>';
                              }
                              ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input id="tanggal-beli" type="text" class="form-control" placeholder="Masukkan Tanggal Beli" name="tanggal_keluar" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Keluar</label>
                        <input type="number" class="form-control" placeholder="Masukkan Nama Kategori" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea required name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit" id="hide-submit-item-out">Submit</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('gudang/bahanmasak'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>