<div class="card">
    <div class="header">
        <h4 class="title">Input Transaksi</h4>
    </div>
    <div class="content">
        <form id="submit-kategori">
            <?php 
            $now = new DateTime(null, new DateTimeZone('Asia/Jakarta'));?>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input readonly="readonly" type="text" class="form-control" value="<?php echo $now->format('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Waktu Transaksi</label>
                        <input readonly="readonly" type="text" class="form-control" placeholder="Username" value="<?php echo $now->format('H:i:s'); ?>">
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kasir</label>
                        <input type="hidden" name="id_menu" value="<?php echo $this->session->userdata("ses_id"); ?>">
                        <input readonly="readonly" type="email" class="form-control" placeholder="Email" value="<?php echo $this->session->userdata("ses_nama"); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Nomor Transaksi</label>
                        <input readonly="readonly" type="text" class="form-control" value="<?php echo "TRANSID-".strtoupper(uniqid()); ?>">
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" placeholder="Username" value="">
                    </div>
                </div>
            </div>
            <div class="after-add-more">
            <div class="row">
                <div class="col-md-5">
            <div class="form-group">
                <label>Pilih Kategori Menu</label>
                <select required="required" name="id_kategori_menu" class="form-control" id="kategori">
                    <option value="">- Pilih Kategori Menu -</option>
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
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>-Pilih Menu</label>
                        <select class="form-control" name="menu" id="menu">
                        </select>
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <div id="jumlah">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" placeholder="Username" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <div class="form-group remove">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Submit</button>
                <a class="btn btn-success btn-fill add-more">Add More</a>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/kategori_menu'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>