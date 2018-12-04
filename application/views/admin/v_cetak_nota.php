<div class="alert alert-success" id="notiftransaksi" style="display:none">
    <span><b>Transaksi Berhasil Disimpan</span>
</div>
<div id="print">
<div class="card">
  <div class="header">
      <h3 class="title">Cetak Nota</h3>
      <br>
      <p class="card-category">Tanggal Transaksi : <?php echo $tanggal_transaksi; ?></p>
      <p class="card-category">Waktu Transaksi : <?php echo $waktu_transaksi; ?></p>
      <p class="card-category">Kasir : <?php echo $this->session->userdata("ses_nama"); ?></p>
      <p class="card-category">No. Transaksi : <?php echo $no_transaksi ?></p>
      <p class="card-category">Nama Customer : <?php echo $nama_customer ?></p>

  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped" id="tblinvois">
          <thead>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Quantity</th>
              <th>Subtotal</th>
          <tbody>
              <?php 
              $iterator = new MultipleIterator();
              $iterator->attachIterator(new ArrayIterator($harga_menu1));
              $iterator->attachIterator(new ArrayIterator($nama_menu1));
              $iterator->attachIterator(new ArrayIterator($quantity1));
              $iterator->attachIterator(new ArrayIterator($id_menu_transaksi1));
              $total_price = 0;
              foreach($iterator as $current) { ?>
                <?php 
                $subtotal=$current[0]*$current[2];
                $percentage = $nilai_promo;
                $total_price += $current[0]*$current[2];
                $diskon = ($total_price*$percentage)/100;
                $total_bayar = $total_price-$diskon;
                ?>
                    <tr>
                      <td><?php echo $current[1]; ?></td>
                      <td><?php echo $current[0]; ?></td>
                      <td><?php echo $current[2]; ?></td>
                      <td><?php echo "$subtotal"; ?></td>
                      <!--<td><button class="btn btn-fill btn-danger btnRemove">Remove</button></td>-->
              <?php }?>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color: #">Total Harga</td>
                  <td style="background-color: #"><?php echo "$total_price"; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color: #">Diskon</td>
                  <td style="background-color: #"><?php echo "$diskon"; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color: #F48024">Total Bayar</td>
                  <td style="background-color: #F48024"><?php echo "$total_bayar"; ?></td>
                </tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<form id="submit-transaksi">
<?php foreach($iterator as $current) { ?>
<?php $subtotal1=$current[0]*$current[2];?>
<input type="hidden" name="tanggal_transaksi[]" class="form-control" value="<?php echo $tanggal_transaksi; ?>">
<input type="hidden" name="waktu_transaksi[]" class="form-control" value="<?php echo $waktu_transaksi; ?>">
<input type="hidden" name="nama_customer[]" class="form-control" value="<?php echo $nama_customer ?>">
<input type="hidden" name="id_menu_transaksi[]" class="form-control" value="<?php echo $current[3]; ?>">
<input type="hidden" name="quantity[]" class="form-control" value="<?php echo $current[2]; ?>">
<input type="hidden" name="id_promo_transaksi[]" class="form-control" value="<?php echo "$id_promo_transaksi"; ?>">
<input type="hidden" name="id_user_transaksi[]" class="form-control" value="<?php echo $this->session->userdata("ses_id"); ?>">
<input type="hidden" name="total_bayar[]" class="form-control" value="<?php echo "$subtotal1"; ?>">
<input type="hidden" name="no_transaksi[]" class="form-control" value="<?php echo $no_transaksi ?>">
<input type="hidden" name="no_transaksiqr" class="form-control" value="<?php echo $no_transaksi ?>">
<?php }?>
<button class="btn btn-fill btn-success" type="submit" id="hide-submit-trnsaksi">Submit</button>
<a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/add_transaksi'); ?>">Kembali</a>
<input class="btn btn-primary btn-fill" type="button" onclick="printDiv('print')" value="Print Invoice" />
</form>