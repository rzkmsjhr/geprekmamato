<div class="card">
    <div class="header">
        <h4 class="title">Input Transaksi</h4>
    </div>
    <div class="content">
        <form action="<?php echo base_url('admin/cetaknota'); ?>" method="POST">
            <?php $now = new DateTime(null, new DateTimeZone('Asia/Jakarta'));?>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input name="tanggal_transaksi" readonly="readonly" type="text" class="form-control" value="<?php echo $now->format('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Waktu Transaksi</label>
                        <input name="waktu_transaksi" readonly="readonly" type="text" class="form-control" value="<?php echo $now->format('H:i:s'); ?>">
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kasir</label>
                        <input type="hidden" name="id_user_transaksi" value="<?php echo $this->session->userdata("ses_id"); ?>">
                        <input readonly="readonly" type="text" class="form-control" value="<?php echo $this->session->userdata("ses_nama"); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Nomor Transaksi</label>
                        <input name="no_transaksi" readonly="readonly" type="text" class="form-control" value="<?php echo "TRANSID-".strtoupper(uniqid()); ?>">
                    </div>
                </div>
                <div class="col-md-4 px-1">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input name="nama_customer" type="text" class="form-control" placeholder="Nama Customer" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Pilih Menu</label>
                        
                        <select required name="menu_transaksi" class="form-control" id="menu">
                        <option value="">- Pilih Menu -</option>
                        <option disabled>──────────</option>
                        <option disabled>- MAKANAN -</option>
                        <?php 
                            foreach($makanan as $row)
                            { 
                                echo '<option value="'.$row->id_menu.'">'.$row->nama_menu.'</option>';
                            }
                        ?>
                        <option disabled>──────────</option>
                        <option disabled>- MINUMAN -</option>
                        <?php 
                            foreach($minuman as $row)
                            { 
                                echo '<option value="'.$row->id_menu.'">'.$row->nama_menu.'</option>';
                            }
                        ?>
                        <option disabled>──────────</option>
                        <option disabled>- SNACK -</option>
                        <?php 
                            foreach($snack as $row)
                            { 
                                echo '<option value="'.$row->id_menu.'">'.$row->nama_menu.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 pl-1">
                    <div class="form-group">
                        <br><a class="btn btn-success btn-fill add-more">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="after-add-more">
                <div class="row">
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label>Nama Menu</label>
                                <div id="list_nama">
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 pr-1">
                        <div class="form-group">
                            <label>Harga</label>
                                <div id="jumlah">
                                </div>
                                <div id="list_promo">
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input name="quantity[]" type="number" class="form-control" placeholder="Jumlah" value="" required>
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <div class="form-group remove">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Pilih Promo</label>
                        <select required name="id_promo_transaksi" class="form-control" id="promo">
                        <option value="">- Pilih Promo -</option>
                        <?php 
                            foreach($promo as $row)
                            {
                                echo '<option value="'.$row->id_promo.'">'.$row->nama_promo.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                </div>
            <div class="form-group">
                <button class="btn btn-fill btn-success" type="submit">Checkout</button>
                <a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/transaksi'); ?>">Kembali</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>