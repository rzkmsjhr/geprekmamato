<div class="card">
  <?php foreach($header as $row){ ?>
  <div class="header">
      <h3 class="title">Detail Transaksi</h3>
      <div class="col-md-3">
      <img src="<?php echo base_url();?>/assets/qrtrans/<?php echo $row->no_transaksi ?>.png" height="200" width="200">
      </div>
      <br>
      <div class="col-md-6">
      <p class="card-category">Tanggal Transaksi : <?php echo $row->tanggal_transaksi ?></p>
      <p class="card-category">Waktu Transaksi : <?php echo $row->waktu_transaksi ?></p>
      <p class="card-category">No Transaksi : <?php echo $row->no_transaksi ?></p>
      <p class="card-category">Nama Customer : <?php echo $row->nama_customer ?></p>
      <p class="card-category">Kasir : <?php echo $row->username ?></p>
      </div>
  </div>

  <?php } ?>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Nama Menu</th>
              <th>Harga Menu</th>
              <th>Quantity</th>
              <th>Subtotal</th>
          </thead>
          <tbody>
          <?php 
          $total_price = 0;
          foreach($sale as $row){ ?>
             <?php 
                $total_price += $row->harga_menu*$row->quantity;
                $diskon = ($total_price*$row->nilai_promo)/100;
                $total_bayar = $total_price-$diskon;
              ?>
                    <tr>
                      <td><?php echo $row->nama_menu ?></td>
                      <td><?php echo $row->harga_menu ?></td>
                      <td><?php echo $row->quantity ?></td>
                      <td><?php echo $row->total_bayar ?></td>
            <?php } ?>  
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color:">Total Bayar</td>
                  <td style="background-color:"><?php echo $total_price ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color:">Diskon</td>
                  <td style="background-color:"><?php echo "$diskon"; ?></td>
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
<a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/transaksi'); ?>">Kembali</a>