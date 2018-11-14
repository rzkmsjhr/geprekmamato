<div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Tanggal Transaksi</th>
              <th>Waktu Transaksi</th>
              <th>No Transaksi</th>
              <th>Nama Customer</th>
              <th>Kasir</th>
              <th>Promo</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php
                  if( ! empty($header)) {
                  foreach($header['transaksi'] as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_transaksi;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->waktu_transaksi ?></td>
                    <td><?php echo $row->no_transaksi ?></td>
                    <td><?php echo $row->nama_customer ?></td>
                    <td><?php echo $row->username ?></td>
                    <td><?php echo $row->nama_promo ?></td>
                <td>
                <a href="<?php echo base_url();?>admin/transaksi_detail/<?php echo $row->no_transaksi; ?>"><i rel="tooltip" title="Detail" class="fa fa-info"></i></a>
                    </td>
                    </tr>
                <?php }}
                else{
                        echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                    }
                ?>
            </tbody>
        </table>
      <?php echo $header['pagination']; ?>
    </div>