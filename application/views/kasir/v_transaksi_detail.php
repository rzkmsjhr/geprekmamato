<div class="card">
  <?php foreach($header as $row){ ?>
  <div class="header">
      <h3 class="title">Detail Transaksi</h3>
      <br>
      <p class="card-category">Tanggal Transaksi : <?php echo $row->tanggal_transaksi ?></p>
      <p class="card-category">Waktu Transaksi : <?php echo $row->waktu_transaksi ?></p>
      <p class="card-category">No Transaksi : <?php echo $row->no_transaksi ?></p>
      <p class="card-category">Nama Customer : <?php echo $row->nama_customer ?></p>
      <p class="card-category">Kasir : <?php echo $row->username ?></p>
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
                  <td style="background-color: #ffff02">Total Bayar</td>
                  <td style="background-color: #ffff02"><?php echo $total_price ?></td></tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-danger btn-fill" href="<?php echo base_url('kasir/transaksi'); ?>">Kembali</a>